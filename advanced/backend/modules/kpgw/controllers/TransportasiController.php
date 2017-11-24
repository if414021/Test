<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\Transportasi;
use backend\modules\kpgw\models\search\TransportasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransportasiController implements the CRUD actions for Transportasi model.
 */
class TransportasiController extends Controller
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
     * Lists all Transportasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransportasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transportasi model.
     * @param integer $id
     * @return mixed
     */
    public function actionTransportasiView($id)
    {
        return $this->render('TransportasiView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transportasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTransportasiAdd()
    {
        $model = new Transportasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/transportasi/transportasi-view', 'id' => $model->transportasi_id]);
        } else {
            return $this->render('TransportasiAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transportasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTransportasiEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/transportasi/transportasi-view', 'id' => $model->transportasi_id]);
        } else {
            return $this->render('TransportasiEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transportasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTransportasiDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transportasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transportasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transportasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
