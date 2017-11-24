<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\StrukturJabatan;
use backend\modules\kpgw\models\search\StrukturJabatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StrukturJabatanController implements the CRUD actions for StrukturJabatan model.
 */
class StrukturJabatanController extends Controller
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
     * Lists all StrukturJabatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StrukturJabatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StrukturJabatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionStrukturJabatanView($id)
    {
        return $this->render('StrukturJabatanView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StrukturJabatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionStrukturJabatanAdd()
    {
        $model = new StrukturJabatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/struktur-jabatan/struktur-jabatan-view', 'id' => $model->struktur_jabatan_id]);
        } else {
            return $this->render('StrukturJabatanAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StrukturJabatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionStrukturJabatanEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/struktur-jabatan/struktur-jabatan-view', 'id' => $model->struktur_jabatan_id]);
        } else {
            return $this->render('StrukturJabatanEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StrukturJabatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionStrukturJabatanDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StrukturJabatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StrukturJabatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StrukturJabatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
