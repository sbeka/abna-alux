<?php

namespace backend\controllers;

use common\models\ClientCenteredness;
use common\models\CorporateProjects;
use common\models\MasterClassTasks;
use common\models\MasterClassTasksImg;
use common\models\Section;
use Yii;
use common\models\Seminars;
use backend\models\search\SeminarsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SeminarsController implements the CRUD actions for Seminars model.
 */
class SeminarsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Seminars models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeminarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seminars model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $MasterClassTasksImg = MasterClassTasksImg::find()->where(['category_id' => $model->id])->orderBy('sort')->all();
        $MasterClassTasksImg_img = new MasterClassTasksImg();

        $MasterClassTasks = MasterClassTasks::find()->where(['category_id' => $model->id])->orderBy('sort')->all();

        $CorporateProjects = CorporateProjects::find()->where(['category_id' => $model->id])->orderBy('sort')->all();

        $Section = Section::find()->where(['category_id' => $model->id])->orderBy('sort')->all();

        $ClientCenteredness = ClientCenteredness::find()->where(['category_id' => $model->id])->orderBy('sort')->all();
        $ClientCenteredness_img = new ClientCenteredness();

        return $this->render('view', compact('model', 'MasterClassTasksImg', 'MasterClassTasksImg_img',
            'MasterClassTasks', 'CorporateProjects', 'Section', 'ClientCenteredness', 'ClientCenteredness_img'));
    }

    /**
     * Creates a new Seminars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seminars();

        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstances($model, 'img');

            $time = time();
            foreach($model->img as $file){
                $file->saveAs($model->path . $time . $file->baseName . '.' . $file->extension);
                $model->img = $time . $file->baseName . '.' . $file->extension;
                break;
            }

            $model->data = strtotime(date($model->data.' '.$model->hours.':'.$model->minutes.':00'));

            if($model->save(false)){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Seminars::findOne($id);
        $images = $model->img;

        $data =  date("Y-m-d", $model->data);
        $time = $model->data - strtotime($data);

        $minutes = ($time % 3600) / 60;
        $hours = $time / 3600;

        $pattern = "/(\d+)\.(\d+)/i";
        $replacement = "\$1";
        $hours =  preg_replace($pattern, $replacement, $hours);

        $model->hours = $hours;
        $model->minutes = $minutes;

        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstances($model, 'img');

            $time = time();
            if(count($img) > 0) {
                foreach ($img as $file) {
                    $file->saveAs($model->path . $time . $file->baseName . '.' . $file->extension);
                    $model->img = $time . $file->baseName . '.' . $file->extension;
                    break;
                }
            }else{
                $model->img = $images;
            }

            $model->data = strtotime(date($model->data.' '.$model->hours.':'.$model->minutes.':00'));

            if($model->save(false)){
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing Seminars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seminars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seminars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seminars::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
