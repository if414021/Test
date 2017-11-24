<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\KategoriSuratCuti;
use backend\modules\kpgw\models\search\KategoriSuratCutiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KategoriSuratCutiController implements the CRUD actions for KategoriSuratCuti model.
 */
class KategoriSuratCutiController extends Controller
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
     * Lists all KategoriSuratCuti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KategoriSuratCutiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KategoriSuratCuti model.
     * @param integer $id
     * @return mixed
     */
    public function actionKategoriSuratCutiView($id)
    {
        return $this->render('KategoriSuratCutiView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KategoriSuratCuti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionKategoriSuratCutiAdd()
    {
        $model = new KategoriSuratCuti();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/kategori-surat-cuti/kategori-surat-cuti-view', 'id' => $model->kategori_surat_cuti_id]);
        } else {
            return $this->render('KategoriSuratCutiAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KategoriSuratCuti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionKategoriSuratCutiEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/kategori-surat-cuti/kategori-surat-cuti-view', 'id' => $model->kategori_surat_cuti_id]);
        } else {
            return $this->render('KategoriSuratCutiEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KategoriSuratCuti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionKategoriSuratCutiDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KategoriSuratCuti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KategoriSuratCuti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KategoriSuratCuti::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
