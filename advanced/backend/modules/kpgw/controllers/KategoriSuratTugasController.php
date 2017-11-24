<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\KategoriSuratTugas;
use backend\modules\kpgw\models\search\KategoriSuratTugasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KategoriSuratTugasController implements the CRUD actions for KategoriSuratTugas model.
 */
class KategoriSuratTugasController extends Controller
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
     * Lists all KategoriSuratTugas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KategoriSuratTugasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KategoriSuratTugas model.
     * @param integer $id
     * @return mixed
     */
    public function actionKategoriSuratTugasView($id)
    {
        return $this->render('KategoriSuratTugasView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KategoriSuratTugas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionKategoriSuratTugasAdd()
    {
        $model = new KategoriSuratTugas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/kategori-surat-tugas/kategori-surat-tugas-view', 'id' => $model->kategori_surat_tugas_id]);
        } else {
            return $this->render('KategoriSuratTugasAdd', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KategoriSuratTugas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionKategoriSuratTugasEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/kpgw/kategori-surat-tugas/kategori-surat-tugas-view', 'id' => $model->kategori_surat_tugas_id]);
        } else {
            return $this->render('KategoriSuratTugasEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KategoriSuratTugas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionKategoriSuratTugasDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KategoriSuratTugas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KategoriSuratTugas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KategoriSuratTugas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
