<?php
namespace frontend\controllers;

use common\models\Advantages;
use common\models\DomeHouses;
use common\models\Forums;
use common\models\Interiors;
use common\models\Menu;
use common\models\News;
use common\models\Seminars;
use common\models\Slider;
use common\models\Speakers;
use common\models\StandardSolutions;
use common\models\TypesObjects;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Menu::find()->where('url = "/"')->one();
        $slider = Slider::find()->where('category_id = '.$model->id)->orderBy('sort')->all();

//        $seminars = "";
//        $seminar = Seminars::find()->where("data > ".time())->orderBy('data')->limit(1)->one();
//
//        if($seminar)
//            $seminars = Seminars::find()->where("data > ".time()." AND id != ".$seminar->id)->orderBy('data')->limit(2)->all();

//        $seminars = Seminars::find()->where("data > ".time())->limit(3)->orderBy('data')->one();

        $seminars = Seminars::find()->orderBy('data')->limit(3)->all();

        $data = date('Y-m-d', time());
        $data = strtotime($data);

        $time = $data + 86400;

        $forums_calendar = Forums::find()->where("data BETWEEN $data".' AND '.$time)->orderBy('data')->all();
        $seminars_calendar = Seminars::find()->where("data BETWEEN $data".' AND '.$time)->orderBy('data')->all();

        $forums_left_calendar =  Forums::find()->where("data > ".time())->orderBy('data')->limit(3)->all();
        $count_left = count($forums_left_calendar);
        if($count_left < 3) {
            $count_left = 3 - $count_left;
            $seminars_left_calendar = Seminars::find()->where("data > " . time())->orderBy('data')->limit($count_left)->all();
        }

//        $news = News::find()->where("data > ".time())->orderBy('data')->limit(4)->all();
        $news = News::find()->orderBy('data')->all();

        $speakers = Speakers::find()->all();

        $this->setMeta($model->title, $model->keywords, $model->description);

        $seminars_all = Seminars::find()->where('status = 1')->all();
        $forums_all = Forums::find()->where('status = 1')->all();

        return $this->render('index', compact('model', 'slider', 'seminars', 'news', 'speakers', 'seminars_all', 'forums_all'
            ,'forums_calendar', 'seminars_calendar', 'seminars_left_calendar', 'forums_left_calendar'));
    }

    public function actionCalendar()
    {
        $time = strtotime($_GET['time']) + 86400;
        $seminars = Seminars::find()->where('data BETWEEN '.strtotime($_GET['time']).' AND '.$time)->all();
        $forums   = Forums::find()->where('data BETWEEN '.strtotime($_GET['time']).' AND '.$time)->all();

//    ob_start();
    $arr = [
        'январь',
        'февраль',
        'март',
        'апрель',
        'май',
        'июнь',
        'июль',
        'август',
        'сентябрь',
        'октябрь',
        'ноябрь',
        'декабрь'
    ];
     foreach($seminars as $v){
         $data =  date("Y-m-d", $v->data);
         $time = $v->data - strtotime($data);

         $minutes = ($time % 3600) / 60;
         $hours = $time / 3600;

         $pattern = "/(\d+)\.(\d+)/i";
         $replacement = "\$1";
         $hours =  preg_replace($pattern, $replacement, $hours);

        $month = date('n', $v->data)-1;
        $month =  $arr[$month];
        $datad = date('d', $v->data);
        echo '<div class="cal-dates p-4 d-flex flex-row justify-content-between">
            <div class="cal-numb-wrap d-flex">
                <div class="cal-numb">
                    <span>'.$datad.'</span>
                    <div class="cal-smalltext">'.$month.'</div>
                </div>
                <div class="cal-pup-textt">
                    '.$v->title_opisanie.'
                </div>
            </div>
            <div class="cal-time d-flex">
                <div class="cal-hour">'.$hours.'</div>
                <div class="cal-min-am-pm">
                    <div class="cal-mins">'.$minutes.'</div>
                    <div class="cal-am-pm">am</div>
                </div>
            </div>
        </div>';
     }
     foreach($forums as $v){
         $data =  date("Y-m-d", $v->data);
         $time = $v->data - strtotime($data);

         $minutes = ($time % 3600) / 60;
         $hours = $time / 3600;

         $pattern = "/(\d+)\.(\d+)/i";
         $replacement = "\$1";
         $hours =  preg_replace($pattern, $replacement, $hours);

        $month = date('n', $v->data)-1;
        $month =  $arr[$month];

        $datad = date('d', $v->data);
        echo '<div class="cal-dates p-4 d-flex flex-row justify-content-between">
            <div class="cal-numb-wrap d-flex">
                <div class="cal-numb">
                    <span>'.$datad.'</span>
                    <div class="cal-smalltext">'.$month.'</div>
                </div>
                <div class="cal-pup-textt">
                    '.$v->title_opisanie.'
                </div>
            </div>
            <div class="cal-time d-flex">
                <div class="cal-hour">'.$hours.'</div>
                <div class="cal-min-am-pm">
                    <div class="cal-mins">'.$minutes.'</div>
                    <div class="cal-am-pm">am</div>
                </div>
            </div>
        </div>';
     }
//    ob_get_clean();
        die;
//      echo $this->render('sobitia', compact('seminars', 'forums'));

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            $model->password = '';
//
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Logs out the current user.
//     *
//     * @return mixed
//     */
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
//    public function actionRequestPasswordReset()
//    {
//        $model = new PasswordResetRequestForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
//            } else {
//                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
//            }
//        }
//
//        return $this->render('requestPasswordResetToken', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
//    public function actionResetPassword($token)
//    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->session->setFlash('success', 'New password saved.');
//
//            return $this->goHome();
//        }
//
//        return $this->render('resetPassword', [
//            'model' => $model,
//        ]);
//    }
	
	public function actionGetevents() {
		$e = $_GET["date"];
		$date = explode("-", $e);
		$year = $date[0];
		$month = $date[1];
		$day = $date[2];

		if (strlen($month) == 1) {
			$month = "0".$month;
		}
		if (strlen($day) == 1) {
			$day = "0".$day;
		}
		
		$date = $year."-".$month."-".$day;
		$dStart = strtotime($date);
		$dEnd = $dStart+86399;
		$monthTitles = [
			'январь',
			'февраль',
			'март',
			'апрель',
			'май',
			'июнь',
			'июль',
			'август',
			'сентябрь',
			'октябрь',
			'ноябрь',
			'декабрь'
		];
		
		$seminars = Seminars::find()->where('data BETWEEN '.$dStart.' AND '.$dEnd)->all();
		
		$events = '';
		foreach($seminars as $sem) {
			$eventMonth = date('m', $sem['data']);
			$eventMonth = intval($eventMonth)-1;
			$eventDay = date('d', $sem['data']);
			$eventHour = date('H', $sem['data']);
			$eventMinute = date('i', $sem['data']);
			$events .= '<div class="event-item">
				<div class="event-date">
					<h1>'.$eventDay.'</h1>
					<span>'.$monthTitles[$eventMonth].'</span>
				</div>
				<div class="event-time">
					<table>
						<tr>
							<td>
								<div class="hour">'.$eventHour.'</div>
							</td>
							<td>
								<div class="minute">'.$eventMinute.'</div>
								<div class="type">am</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="event-title">
					<a href="">'.$sem["title_opisanie"].'</a>
				</div>
				<div class="clear"></div>
			</div>';
		}
		
		if (count($seminars) == 0) {
			$events = '<h1>Нет событий</h1>';
		}
		
		echo $events;
	}
	
	
	
	
	
	
	public function actionGetforumandevents() {
		$e = $_GET["date"];
		$date = explode("-", $e);
		$year = $date[0];
		$month = $date[1];
		$day = $date[2];

		if (strlen($month) == 1) {
			$month = "0".$month;
		}
		if (strlen($day) == 1) {
			$day = "0".$day;
		}
		
		$date = $year."-".$month."-".$day;
		$dStart = strtotime($date);
		$dEnd = $dStart+86399;
		$monthTitles = [
			'январь',
			'февраль',
			'март',
			'апрель',
			'май',
			'июнь',
			'июль',
			'август',
			'сентябрь',
			'октябрь',
			'ноябрь',
			'декабрь'
		];
		
		$seminars = Seminars::find()->where('data BETWEEN '.$dStart.' AND '.$dEnd)->all();
		
		$events = '';
		foreach($seminars as $sem) {
			$eventMonth = date('m', $sem['data']);
			$eventMonth = intval($eventMonth)-1;
			$eventDay = date('d', $sem['data']);
			$eventHour = date('H', $sem['data']);
			$eventMinute = date('i', $sem['data']);
			$events .= '<table class="seminar-item">
				<tr>
					<td class="img-td">
						<img src="/backend/web/images/seminars/'.$sem["img"].'" title="image">
					</td>
					<td class="second-td">
						<div class="event-item">
							<div class="event-date">
								<h1>'.$eventDay.'</h1>
								<span>'.$monthTitles[$eventMonth].'</span>
							</div>
							<div class="event-title">
								<a href="">'.$sem["title_opisanie"].'</a>
							</div>
							<div class="clear"></div>
						</div>
						<div class="event-text">'.$sem["text_opisanie"].'</div>
						<a href="#" class="tsp-but">Читать далее</a>
					</td>
				</tr>
			</table>';
		}
		
		if (count($seminars) == 0) {
			$events = '<h1>Нет событий</h1>';
		}
		
		echo $events;
	}
}
