<?php

namespace backend\controllers;

use Yii;
use common\models\Section;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * SectionController implements the CRUD actions for Section model.
 */
class SectionController extends Controller
{
    public function actionCreate($id)
    {
        $model = new Section();

        $model->name = '';
        $model->text = '';
        $model->title = '';
        $model->category_id = $id;
        $model->save(false);

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionEdit($id)
    {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();

            foreach($post['Section']['id'] as $k => $v){
                $model = Section::findOne($post['Section']['id'][$k]);
                $model->name = $post['Section']['name'][$k];
                $model->text = $post['Section']['text'][$k];
                $model->title = $post['Section']['title'][$k];
                $model->save(false);
            }

        }

        $this->redirect(['seminars/view', 'id' => $id]);
    }

    public function actionMoveUp($id, $menu_id)
    {
        $model = Section::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = Section::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save();

            $model->sort -= 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionMoveDown($id, $menu_id)
    {
        $model = Section::findOne($id);
        $model_max_sort = Section::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = Section::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save();

            $model->sort += 1;
            $model->save();
        }
        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }

    public function actionDelete($id, $menu_id)
    {
        $model = Section::findOne($id);
        $models = Section::find()->where('sort > '.$model->sort)->all();

        foreach($models as $v){
            $v->sort--;
            $v->save(false);
        }

        Section::deleteAll(['id' => $id]);

        $this->redirect(['seminars/view', 'id' => $menu_id]);
    }
}
