<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 03.08.2018
 * Time: 11:47
 */

namespace frontend\controllers;

use common\models\Seminars;
use common\models\Slider;
use common\models\Speakers;
use yii\web\Controller;

class MenuController extends Controller
{
    public function actionTrainings_and_seminars($url = "")
    {
        if($url){
            $model = Seminars::find()->where("url = '$url'")->one();
            $slider = Slider::find()->where("category_id = 14")->all();

            return $this->render('trainings_and_seminars', compact('model', 'slider'));
        }else{
            $model = Seminars::find()->where('data > '.time())->all();

            return $this->render('trainings_and_seminars_all', compact('model'));
        }
    }

    public function actionSpeakers(){
        $model = Speakers::find()->all();

        return $this->render('speakers', compact('model'));
    }
}