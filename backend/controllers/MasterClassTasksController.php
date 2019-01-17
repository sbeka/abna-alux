<?php

namespace backend\controllers;

use Yii;
use common\models\MasterClassTasks;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * MasterClassTasksController implements the CRUD actions for MasterClassTasks model.
 */
class MasterClassTasksController extends Controller
{
    public function actionCreate($id)
    {
        $model = new MasterClassTasks();

        $model->name = '';
        $model->text = '';
        $model->price = '';
        $model->category_id = $id;
        $model->save(false);

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionEdit($id)
    {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

            foreach($post['MasterClassTasks']['id'] as $k => $v){
                $model = MasterClassTasks::findOne($post['MasterClassTasks']['id'][$k]);
                $model->name = $post['MasterClassTasks']['name'][$k];
                $model->text = $post['MasterClassTasks']['text'][$k];
                $model->price = $post['MasterClassTasks']['price'][$k];
                $model->save(false);
            }

        }

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionMoveUp($id, $menu_id)
    {
        $model = MasterClassTasks::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = MasterClassTasks::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save(false);

            $model->sort -= 1;
            $model->save(false);
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionMoveDown($id, $menu_id)
    {
        $model = MasterClassTasks::findOne($id);
        $model_max_sort = MasterClassTasks::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = MasterClassTasks::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save(false);

            $model->sort += 1;
            $model->save(false);
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionDelete($id, $menu_id)
    {
        $model = MasterClassTasks::findOne($id);
        $models = MasterClassTasks::find()->where('sort > '.$model->sort)->all();

        foreach($models as $v){
            $v->sort--;
            $v->save(false);
        }

        MasterClassTasks::deleteAll(['id' => $id]);

        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }
}
