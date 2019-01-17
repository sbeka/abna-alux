<?php

namespace backend\controllers;

use common\models\Menu;
use Yii;
use common\models\Slider;
use backend\models\search\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $Slider = Slider::find()->where("category_id = $id")->orderBy('sort')->all();

        $menu = Menu::findOne($id);

        return $this->render('view', [
            'Slider' => $Slider, 'id' => $id, 'menu' => $menu
        ]);
    }

    public function actionCreate($id)
    {
        $model = new Slider();

        if ($model->load(Yii::$app->request->post())) {
            $model->files = UploadedFile::getInstances($model, 'files');

            foreach($model->files as $file) {
//                echo '<pre>'. print_r($file->extension, true). '</pre>';
                $model1 = new Slider();
                $time = time();
                $file->saveAs($model1->path . $time . $file->baseName . '.' . $file->extension);

                $model1->img = $time . $file->baseName . '.' . $file->extension;
                $model1->title1 = '';
                $model1->title2 = '';
                $model1->title3 = '';
                $model1->category_id = $id;
                $model1->save(false);
            }
        }

        return $this->redirect(['update', 'id' => $id]);
    }

    public function actionUpdate($id)
    {
        $title_slider = Menu::findOne($id);
        $model = Slider::find()->where("category_id = $id")->orderBy('sort')->all();
        $new_model = new Slider();

        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

            foreach($post['Slider']['id'] as $k => $v){
                $model1 = Slider::findOne($post['Slider']['id'][$k]);
                $model1->title1 = $post['Slider']['title1'][$k];
                $model1->title2 = $post['Slider']['title2'][$k];
                $model1->title3 = $post['Slider']['title3'][$k];
                $model1->save(false);
            }
//            return $this->redirect(['view', 'id' => $id]);
            $model = Slider::find()->where("category_id = $id")->orderBy('sort')->all();
        }

        return $this->render('update', compact('model', 'new_model', 'id', 'title_slider'));
    }


    public function actionMoveUp($id, $menu_id)
    {
        $model = Slider::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = Slider::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save();

            $model->sort -= 1;
            $model->save();
        }
        return $this->redirect(['update', 'id' => $menu_id]);
    }

    public function actionMoveDown($id, $menu_id)
    {
        $model = Slider::findOne($id);
        $model_max_sort = Slider::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = Slider::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save();

            $model->sort += 1;
            $model->save();
        }
        return $this->redirect(['update', 'id' => $menu_id]);
    }

    public function actionDelete($id, $menu_id)
    {
        $model = Slider::findOne($id);
        $models = Slider::find()->where('sort > '.$model->sort)->all();

        foreach($models as $v){
            $v->sort--;
            $v->save(false);
        }

        Slider::deleteAll(['id' => $id]);

        return $this->redirect(['update', 'id' => $menu_id]);
    }
}
