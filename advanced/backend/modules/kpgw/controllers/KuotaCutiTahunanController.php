<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\KuotaCutiTahunan;
use backend\modules\kpgw\models\search\KuotaCutiTahunanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KuotaCutiTahunanController implements the CRUD actions for KuotaCutiTahunan model.
 */
class KuotaCutiTahunanController extends Controller
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
     * Lists all KuotaCutiTahunan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KuotaCutiTahunanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KuotaCutiTahunan model.
     * @param integer $id
     * @return mixed
     */
    public function actionKuotaCutiTahunanView($id)
    {
        return $this->render('KuotaCutiTahunanView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KuotaCutiTahunan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionKuotaCutiTahunanAdd()
    {
        $model = new KuotaCutiTahunan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['KuotaCutiTahunanView', 'id' => $model->kuota_cuti_tahunan_id]);
        } else {
            return $this->render('KuotaCutiTahunanAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KuotaCutiTahunan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionKuotaCutiTahunanEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['KuotaCutiTahunanView', 'id' => $model->kuota_cuti_tahunan_id]);
        } else {
            return $this->render('KuotaCutiTahunanEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KuotaCutiTahunan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionKuotaCutiTahunanDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KuotaCutiTahunan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KuotaCutiTahunan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KuotaCutiTahunan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
