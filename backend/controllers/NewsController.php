<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use backend\models\search\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstances($model, 'img');

            $time = time();
            foreach($model->img as $file){
                $file->saveAs($model->path . $time . $file->baseName . '.' . $file->extension);
                $model->img = $time . $file->baseName . '.' . $file->extension;
                break;
            }

            $model->data = strtotime($model->data);

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
        $model = News::findOne($id);
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

            $model->data = strtotime($model->data);

            if($model->save(false)){
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
