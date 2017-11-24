<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\Signer;
use backend\modules\kpgw\models\search\SignerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SignerController implements the CRUD actions for Signer model.
 */
class SignerController extends Controller
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
     * Lists all Signer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SignerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Signer model.
     * @param integer $id
     * @return mixed
     */
    public function actionSignerView($id)
    {
        return $this->render('SignerView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Signer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignerAdd()
    {
        $model = new Signer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/signer/signer-view', 'id' => $model->signer_id]);
        } else {
            return $this->render('SignerAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Signer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSignerEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/signer/signer-view', 'id' => $model->signer_id]);
        } else {
            return $this->render('SignerEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Signer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSignerDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Signer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Signer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Signer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
