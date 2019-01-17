<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use backend\models\search\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionTop()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->searchTop(Yii::$app->request->queryParams);

        return $this->render('top', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMiddle()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->searchMiddle(Yii::$app->request->queryParams);

        return $this->render('middle', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFooter()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->searchFooter(Yii::$app->request->queryParams);

        return $this->render('footer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['top']);
    }

    public function actionMoveUp($id, $where)
    {
        $model = Menu::findOne($id);
        $sort_where = "sort_".$where;
        if ($model->$sort_where != 1) {
            $sort = $model->$sort_where - 1;
            $model_down = Menu::find()->where("$sort_where = $sort")->one();
            $model_down->$sort_where += 1;
            $model_down->save();

            $model->$sort_where -= 1;
            $model->save();
        }
        return $this->redirect([$where]);
    }

    public function actionMoveDown($id, $where)
    {
        $model = Menu::findOne($id);
        $model_max_sort = Menu::find()->orderBy("sort_$where DESC")->one();
        $sort_where = "sort_".$where;
        if ($model->id != $model_max_sort->id) {
            $sort = $model->$sort_where + 1;
            $model_up = Menu::find()->where("$sort_where = $sort")->one();
            $model_up->$sort_where -= 1;
            $model_up->save();

            $model->$sort_where += 1;
            $model->save();
        }
        return $this->redirect([$where]);
    }
    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
}
