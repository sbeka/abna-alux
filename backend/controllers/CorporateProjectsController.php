<?php

namespace backend\controllers;

use Yii;
use common\models\CorporateProjects;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * CorporateProjectsController implements the CRUD actions for CorporateProjects model.
 */
class CorporateProjectsController extends Controller
{
    public function actionCreate($id)
    {
        $model = new CorporateProjects();

        $model->name = '';
        $model->text = '';
        $model->category_id = $id;
        $model->save(false);

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionEdit($id)
    {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

            foreach($post['CorporateProjects']['id'] as $k => $v){
                $model = CorporateProjects::findOne($post['CorporateProjects']['id'][$k]);
                $model->name = $post['CorporateProjects']['name'][$k];
                $model->text = $post['CorporateProjects']['text'][$k];
                $model->save(false);
            }

        }

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionMoveUp($id, $menu_id)
    {
        $model = CorporateProjects::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = CorporateProjects::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save();

            $model->sort -= 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionMoveDown($id, $menu_id)
    {
        $model = CorporateProjects::findOne($id);
        $model_max_sort = CorporateProjects::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = CorporateProjects::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save();

            $model->sort += 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionDelete($id, $menu_id)
    {
        $model = CorporateProjects::findOne($id);
        $models = CorporateProjects::find()->where('sort > '.$model->sort)->all();

        foreach($models as $v){
            $v->sort--;
            $v->save(false);
        }

        CorporateProjects::deleteAll(['id' => $id]);

        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }
}
