<?php

namespace backend\controllers;

use Yii;
use common\models\MasterClassTasksImg;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * MasterClassTasksImgController implements the CRUD actions for MasterClassTasksImg model.
 */
class MasterClassTasksImgController extends Controller
{
    public function actionCreate($id)
    {
        $model = new MasterClassTasksImg();

        if ($model->load(Yii::$app->request->post())) {
            $model->files = UploadedFile::getInstances($model, 'files');

            foreach($model->files as $file) {
//                echo '<pre>'. print_r($file->extension, true). '</pre>';
                $model1 = new MasterClassTasksImg();
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

            foreach($post['MasterClassTasksImg']['id'] as $k => $v){
                $model = MasterClassTasksImg::findOne($post['MasterClassTasksImg']['id'][$k]);
                $model->name = $post['MasterClassTasksImg']['name'][$k];
                $model->text = $post['MasterClassTasksImg']['text'][$k];
                $model->save(false);
            }

        }

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionMoveUp($id, $menu_id)
    {
        $model = MasterClassTasksImg::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = MasterClassTasksImg::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save();

            $model->sort -= 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionMoveDown($id, $menu_id)
    {
        $model = MasterClassTasksImg::findOne($id);
        $model_max_sort = MasterClassTasksImg::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = MasterClassTasksImg::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save();

            $model->sort += 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionDelete($id, $menu_id)
    {
        $model = MasterClassTasksImg::findOne($id);
        $models = MasterClassTasksImg::find()->where('sort > '.$model->sort)->all();

        foreach($models as $v){
            $v->sort--;
            $v->save(false);
        }

        MasterClassTasksImg::deleteAll(['id' => $id]);

        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }
}
