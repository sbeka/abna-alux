<?php

namespace backend\controllers;

use Yii;
use common\models\Speakers;
use backend\models\search\SpeakersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SpeakersController implements the CRUD actions for Speakers model.
 */
class SpeakersController extends Controller
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
     * Lists all Speakers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpeakersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Speakers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Speakers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Speakers();

        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstances($model, 'img');

            $time = time();
            foreach($model->img as $file){
                $file->saveAs($model->path . $time . $file->baseName . '.' . $file->extension);
                $model->img = $time . $file->baseName . '.' . $file->extension;
                break;
            }

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
        $model = Speakers::findOne($id);
        $images = $model->img;

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

            if($model->save(false)){
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing Speakers model.
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
     * Finds the Speakers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Speakers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Speakers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
