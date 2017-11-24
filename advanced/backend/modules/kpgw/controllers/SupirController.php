<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\Supir;
use backend\modules\kpgw\models\search\SupirSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SupirController implements the CRUD actions for Supir model.
 */
class SupirController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Supir models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SupirSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Supir model.
     * @param integer $id
     * @return mixed
     */
    public function actionSupirView($id)
    {
        return $this->render('SupirView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Supir model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSupirAdd()
    {
        $model = new Supir();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/supir/supir-view', 'id' => $model->supir_id]);
        } else {
            return $this->render('SupirAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Supir model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSupirEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/supir/supir-view', 'id' => $model->supir_id]);
        } else {
            return $this->render('SupirEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Supir model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSupirDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Supir model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Supir the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Supir::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
