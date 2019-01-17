<?php

namespace backend\controllers;

use Yii;
use common\models\ClientCenteredness;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * ClientCenterednessController implements the CRUD actions for ClientCenteredness model.
 */
class ClientCenterednessController extends Controller
{
    public function actionCreate($id)
    {
        $model = new ClientCenteredness();

        if ($model->load(Yii::$app->request->post())) {
            $model->files = UploadedFile::getInstances($model, 'files');

            foreach($model->files as $file) {
//                echo '<pre>'. print_r($file->extension, true). '</pre>';
                $model1 = new ClientCenteredness();
                $time = time();
                $file->saveAs($model1->path . $time . $file->baseName . '.' . $file->extension);

                $model1->img = $time . $file->baseName . '.' . $file->extension;
                $model1->name = "";
                $model1->text = "";
                $model1->category_id = $id;
                $model1->save(false);
            }

        }
        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionEdit($id)
    {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

            foreach($post['ClientCenteredness']['id'] as $k => $v){
                $model = ClientCenteredness::findOne($post['ClientCenteredness']['id'][$k]);
                $model->name = $post['ClientCenteredness']['name'][$k];
                $model->text = $post['ClientCenteredness']['text'][$k];
                $model->save(false);
            }

        }

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionMoveUp($id, $menu_id)
    {
        $model = ClientCenteredness::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = ClientCenteredness::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save();

            $model->sort -= 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionMoveDown($id, $menu_id)
    {
        $model = ClientCenteredness::findOne($id);
        $model_max_sort = ClientCenteredness::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = ClientCenteredness::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save();

            $model->sort += 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionDelete($id, $menu_id)
    {
        $model = ClientCenteredness::findOne($id);
        $models = ClientCenteredness::find()->where('sort > '.$model->sort)->all();

        foreach($models as $v){
            $v->sort--;
            $v->save(false);
        }

        ClientCenteredness::deleteAll(['id' => $id]);

        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }
}
