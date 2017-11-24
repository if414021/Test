<?php

namespace backend\modules\kpgw\controllers;

use Yii;
use backend\modules\kpgw\models\SuratTugas;
use backend\modules\kpgw\models\Signer;
use backend\modules\kpgw\models\search\SuratTugasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\kpgw\models\Pegawai;
use backend\modules\kpgw\models\User;
use mPDF;

/**
 * SuratTugasController implements the CRUD actions for SuratTugas model.
 */
class SuratTugasController extends Controller
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
     * Lists all SuratTugas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id = Yii::$app->user->identity->id;
        $searchModel = new SuratTugasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider1 = $searchModel->search1(Yii::$app->user->identity->id, 'Approved', 'Final_Approving');
        $dataProvider2 = $searchModel->search1(Yii::$app->user->identity->id, 'Requesting', '');
        $dataProvider3 = $searchModel->search1(Yii::$app->user->identity->id, 'Reject', 'Waiting');
        $dataProvider4 = $searchModel->search1(Yii::$app->user->identity->id, 'Reject', '');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1,
            'dataProvider2' => $dataProvider2,
            'dataProvider3' => $dataProvider3,
            'dataProvider4' => $dataProvider4,
        ]);
    }

    public function actionSuratTugasIndex() {
        $searchModel = new SuratTugasSearch();
        $dataProvider = $searchModel->searchbyhrd(Yii::$app->request->queryParams);
        $dataProvider4 = $searchModel->searchbyhrd('Approved');
        $dataProvider5 = $searchModel->searchbyhrd('Requesting');
        $dataProvider6 = $searchModel->searchbyhrd('Reject');

        return $this->render('SuratTugasIndex', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProvider4' => $dataProvider4,
                    'dataProvider5' => $dataProvider5,
                    'dataProvider6' => $dataProvider6,
        ]);
    }

    public function actionSuratTugasIndexByWr() {
        $searchModel = new SuratTugasSearch();

        $dataProvider = $searchModel->searchbywr(Yii::$app->request->queryParams);
        $dataProvider4 = $searchModel->searchbywrfinal('Approved', 'Final_Approved');
        $dataProvider8 = $searchModel->searchbywr('Requesting');
        $dataProvider9 = $searchModel->searchbywr('Reject', 'Final_Rejecting');

        return $this->render('SuratTugasIndexByWr', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProvider4' => $dataProvider4,
                    'dataProvider8' => $dataProvider8,
                    'dataProvider9' => $dataProvider9,
        ]);
    }
    
    /**
     * Displays a single SuratTugas model.
     * @param integer $id
     * @return mixed
     */
    public function actionSuratTugasView($id)
    {
        return $this->render('SuratTugasView', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratTugas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSuratTugasAdd()
    {
        $model = new SuratTugas();
        $model->tanggal_pengajuan = date('Y-m-d');
        $model->created_at = date('Y-m-d');
        $model->created_by = Yii:: $app->user->identity->username;
        $model->user_id =  Yii::$app->user->identity->id;
        $data = Yii::$app->request->post();
        $model->status_broadcast = 'Not Submitted Yet';
        $model->status_laporan = 'Not Submitted Yet';

        $model->load(Yii::$app->request->post());

        if (!empty($data)) {
            $model["dosen_pendamping"] = $data["SuratTugas"]["dosen_pendamping"];
            if (!empty($model["dosen_pendamping"])) {
                $model["dosen_pendamping"] = implode(',', $model["dosen_pendamping"]);
            }
            if ($model->save()) {
                return $this->redirect(['/kpgw/surat-tugas/surat-tugas-view', 'id' => $model->surat_tugas_id]);
            }
        }  else {
            return $this->render('SuratTugasAdd', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionSendmail($id) {
        $suratTugas = SuratTugas::find()->where(['surat_tugas_id' => $id])->one();
        $pegawai = Pegawai::find()->where(['user_id' => $suratTugas->user_id])->one();
        $tujuan = 'if414029@students.del.ac.id';
        $date = date('H:i');
        $sapa = '';
        if ($date < 12)
            $sapa = "Pagi";
        else if ($date < 14)
            $sapa = 'Siang';
        else if ($date < 18)
            $sapa = 'Sore';
        $message = 'Yth. Bapak/Ibu Dosen/Staff <br>'
                . 'Selamat ' . $sapa . ' Bapak/Ibu Sekalian. Melalui email ini, Saya ingin menginformasikan bahwa Dosen/Staf yang beridentitas '
                . ' sbb:   <br>'
                . ' Nama: ' . $pegawai->nama . ' <br>'
                . ' NIK : ' . $pegawai->nip . ' <br>'
                . ' Alasan bertugas : ' . $suratTugas->alasan_tugas . ' <br>'
                . ' Tanggal Berangkat : ' . $suratTugas->tanggal_berangkat . ' <br>'
                . ' Tanggal kembali : ' . $suratTugas->tanggal_kembali . '<br>'
                . ' karena beberapa alasan seperti yang telah disebutkan diatas. Demikian email ini saya kirimkan. Atas perhatian Bapak/Ibu Sekalian, Saya Ucapkan Terimakasih'
                . '<br><br><br> <hr> Dikirim oleh : <br>'
                . '<b>HRD Del Institute of Technology - SIPK (Sistem Informasi Pendukung Kepegawaian)<b>';

        $moda = $this->findModel($id);
        $mode = SuratTugas::find()->where(['surat_tugas_id' => $id])->one();


        $moda->status_broadcast = 'Sudah Di-broadcast';

        if ($moda->save(FALSE)) {
            if ($this->Sendmail($message, $tujuan)) {
                Yii::$app->getSession()->setFlash('success', 'Email telah terkirim');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Email tidak terkirim    ');
            }
            return $this->redirect(['surat-tugas-print']);
        } else {
            return $this->redirect(['surat-tugas-print']);
        }
    }

    public function Sendmail($message, $tujuan) {
        try {
            set_time_limit(180);
            return 
                            Yii::$app->mailer->compose()
                            ->setFrom([\Yii::$app->params['adminEmail'] => 'SIPK'])
                            ->setTo($tujuan)
                            ->setSubject("[IZIN] Tidak Hadir Pada Jam Kuliah")
                            ->setHtmlBody($message)
                            ->send();
        } catch (\Swift_TransportException $exception) {
            return 0;
        }
    }

    //terima request oleh HRD
    public function actionSuratTugasApproved($id) {
        $model = $this->findModel($id);
        $model->status_approvingHRD = 'Approved';
        $model->save();

        $searchModel = new SuratTugasSearch();
        $dataProvider4 = $searchModel->searchbyhrd('Approved');
        $dataProvider6 = $searchModel->searchbyhrd('Reject');

        return $this->render('SuratTugasApprovedBrowse', [
                    'searchModel' => $searchModel,
                    'dataProvider4' => $dataProvider4,
                    'dataProvider6' => $dataProvider6,
        ]);
    }
    
    //tolak request oleh HRD
    public function actionSuratTugasReject($id) {
        $model = $this->findModel($id);
        $model->status_approvingHRD = 'Reject';
        $model->save();

        $searchModel = new SuratTugasSearch();
        $dataProvider4 = $searchModel->searchbyhrd('Approved');
        $dataProvider6 = $searchModel->searchbyhrd('Reject');

        return $this->render('SuratTugasRejectedBrowse', [
                    'searchModel' => $searchModel,
                    'dataProvider4' => $dataProvider4,
                    'dataProvider6' => $dataProvider6,
        ]);
    }

    //terima request oleh WR final
    public function actionSuratTugasApprovedByWr($id) {
        $model = $this->findModel($id);
        $user = Yii::$app->user->id;
        $signer = Signer::find()->where(['user_id' => $user])->one();
        $model->status_approvingWR = 'Final_Approving';
        $model->signer_id = $signer['signer_id'];
        $model->save();

        $searchModel = new SuratTugasSearch();
        $dataProvider4 = $searchModel->searchbywrfinal('Approved', 'Final_Approving');
    
        return $this->render('SuratTugasApprovedBrowseByWr', [
                    'searchModel' => $searchModel,
                    'dataProvider4' => $dataProvider4,
        ]);
    }

    //Melihat daftar yang telah di approved by HRD dan WRII/WRIII
    public function actionSuratTugasPrint() {
        $searchModel = new SuratTugasSearch();
        $dataProvider = $searchModel->searchbyhrd(Yii::$app->request->queryParams);
        $dataProvider4 = $searchModel->searchbyhrdFinal('Approved', 'Final_Approving');

        return $this->render('SuratTugasPrint', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProvider4' => $dataProvider4,
        ]);
    }

    /**
     * Updates an existing SuratTugas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSuratTugasEdit($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d');
        $model->updated_by = Yii:: $app->user->identity->username;

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                return $this->redirect(['/kpgw/surat-tugas/surat-tugas-view', 'id' => $model->surat_tugas_id]);
            }
        } else {
            return $this->render('SuratTugasEdit', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratTugas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSuratTugasDel($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuratTugas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratTugas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratTugas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    //Notifikasi oleh HRD
    public function actionSuratTugasNotifikasi()
    {
        $searchModel = new SuratTugasSearch();
        $dataProvider = $searchModel->searchbyhrd(Yii::$app->request->queryParams);
        $dataProvider4 = $searchModel->searchbyhrd('Approved');
        $dataProvider5 = $searchModel->searchbyhrd('Requesting');
        $dataProvider6 = $searchModel->searchbyhrd('Reject');

        return $this->render('SuratTugasNotifikasi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider4' => $dataProvider4,
            'dataProvider5' => $dataProvider5,
            'dataProvider6' => $dataProvider6,
        ]);
    }

    //Melihat Notifikasi oleh WR
    public function actionSuratTugasNotifikasiByWr() {
        $searchModel = new SuratTugasSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = SuratTugas::findBySql("SELECT * FROM kpgw_surat_tugas where status_approvingHRD = 'Approved'");
        $dataProvider = new \yii\data\ActiveDataProvider(["query" => $query,]);

        return $this->render('SuratTugasNotifikasiByWr', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSuratTugasReport($id) {
        $mpdf = new \mPDF();
        $model = $this->findModel($id);
        $pegawai = Pegawai::find()->where(['user_id' => $model->user_id])->one();
        $jabatan = \backend\modules\kpgw\models\StrukturJabatan::findOne($pegawai->struktur_jabatan_id);
        $kategori = \backend\modules\kpgw\models\KategoriSuratTugas::findOne($model->kategori_surat_tugas_id);
        $signer = Signer::find()->where(['signer_id' => $model->signer_id])->one();
        $usersigner = User::find()->where(['user_id' => $signer->user_id])->one();
        $namesigner = Pegawai::find()->where(['user_id' => $usersigner->user_id])->one();
        $jabatansigner = \backend\modules\kpgw\models\StrukturJabatan::findOne($namesigner->struktur_jabatan_id);
        $trans = \backend\modules\kpgw\models\Transportasi::findOne($model->transportasi_berangkat);
        $trans2 = \backend\modules\kpgw\models\Transportasi::findOne($model->transportasi_kembali);
        if (!empty($model->dosen_pendamping)) {
            $implo = explode(",", $model->dosen_pendamping);
            $tampung = new \backend\modules\kpgw\models\Pegawai;
            $rowspan = sizeof($implo) + 1;
            $simpan = '';
            for ($request = 0; $request < sizeof($implo); $request++) {
                $a = 1;
                $a++;

                $tampung = \backend\modules\kpgw\models\Pegawai::find()->where(['user_id' => $model->dosen_pendamping])->one();
                //$arrey[$a] = $tampung->full_name;
                $simpan = $tampung->nama . '<br>' . $simpan;
            }
        } else {
            $simpan='Tidak ada dosen pendamping';
        }
//        echo ($simpan);
//        die();


        $pergi = strtotime($model->tanggal_berangkat);
        $kembali = strtotime($model->tanggal_kembali);
        $differ = round(abs($kembali - $pergi) / 60 / 60 / 24);
        $model->allowance = $differ;
        $model->save();

        $inap = $differ - 1;
        if ($inap <= 0)
            $inap2 = "Tidak bermalam";
        else {
            $inap2 = $inap . ' malam di ' . $model->tujuan;
        }
        $mpdf->SetTitle('Surat Tugas' . $id);
        $html = '
            <style>
             th, td 
              {
                padding: 5px;
                text-align: left;
              }
             table, th, td, p
               {
                border-collapse: collapse;
                vertical-align: bottom; 
                font-family: serif; 
                
                color: #000000; 
                font-style:none;">
               }   
                          
            </style>
            
         <htmlpageheader name="MyHeader1">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="../modules/kpgw/images/ITDEL.png" width="70px" height="75px" style="align:center">
        </htmlpageheader>
        
        <htmlpagefooter name="MyFooter1">
            <table style="width:100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt;
            color: #000000; font-style: italic;" border:"0">
                <tr>
                    <td style="text-align: left;" style="font-style: italic;">
                    Institut  Teknologi Del<br>
                    Jl. Sisingamangaraja Sitoluama-Laguboti<br>
                    Toba Samosir 22381<br>
                    Telp. (0632) 331234 (021) 5455477<br>
                    Fax (0632) 331116,  info@del.ac.id, http://www.del.ac.id <br>
                    </td>
                    <td style="text-align: right;" style=" font-style: italic;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{PAGENO}/{nbpg}</td>
                    <!--<td style="text-align: right; ">{PAGENO}/{nbpg}</td>-->
                </tr>
            </table>
        </htmlpagefooter>
        
        <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1" />
        <sethtmlpagefooter name="MyFooter1" value="on" />
        
        <br><br><br>
        <table width="100%">
            <tr>
                <td>
                <center><h3>Surat Tugas</h3></center>
                    No. 041/ITD/WR2/SDM/ST/III/15
                    <hr>
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <p>Wakil Rektor  Bidang Keuangan dan Sumber Daya  Institut Teknologi  Del (IT  Del) dengan ini memberi tugas kepada: </p  >
               </td>
            </tr> 
            </table>
            <table width="100%"; border="1";>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>NIK</th>
            </tr>  
            <tr>
            <td> ' . $pegawai->nama . '</td>
            <td>' . $jabatan->jabatan . '</td>
            <td>' . $pegawai->nip . '</td>
            </tr>
            </table><br>
            <table width="100%"; border="1">
            <tr>
            <th>Dosen Pendamping</th>
            <td>' . $simpan . '</td>
            </tr>
            </table>
            <p>Untuk ' . $model->alasan_tugas . ' di ' . $model->tujuan . ', yang akan diadakan pada : </p>
                 
            <table style="width=100%">
            <tr>
                 <td  width=4 align="left">Tanggal/Pkl</td>
                 <td  width=4 align="center">:</td>
                 <td  width=600 align="left">' . $model->tanggal_mulai . '</td>
            </tr>
            
             <tr>
                <td width=4 align="left">Tempat</td>
                <td width=4 align="center">:</td>
                <td width=600 align="left">' . $model->tujuan . '</td>
            </tr>
            
            <tr>
                <td align="left">Materi</td>
                <td width=4 align="center">:</td>
                <td width=600 align="left">' . $model->alasan_tugas . '</td>
            </tr>
            
            </table>
         <br>
            <table style="width:100%">
            <tr>  
                <td colspan="10"><!--<H1>Surat Tugas</H1>-->
                   <p>Untuk persiapan dan pelaksanaan Sdr/i ' . $pegawai->nama . ' , berangkat dari ' . $model->rute_berangkat . ' pada tanggal/pukul ' . $model->tanggal_berangkat . ' dengan ' . $trans->desc . ',  dan kembali pada tanggal/pukul ' . $model->tanggal_kembali . ', dengan ' . $trans2->desc . ' setelah menyelesaikan tugas. Sdr/i ' . $Pegawai->nama . ' jika tidak berhalangan akan kembali bertugas seperti biasa 1 hari setelah tanggal kembali.</p>
                   <br>
                   <p>Berkaitan dengan penugasan ini, biaya perjalan dinas yang ditanggung adalah :</p>
                </td>              
            </tr>
            </table>
            <table style="width:100%" border="1">
           
             <tr>
                <td width="2">1</td>
                <td width="150">Transportasi</td>
                <td width="300"> ' . $trans->desc . '</td>
             </tr>
             <tr>
                <td width="2">2</td>
               <td width="150">Penginapan</td>
                <td width="300">' . $inap2 . '</td>
             </tr>
             <tr>
                <td width="2">3</td>
                <td width="150">Allowance</td>
                <td width="300">' . $model->allowance . ' Hari </td>
             </tr>
             </table>

             <p>Sdr/i ' . $pegawai->nama . ' diminta membuat laporan tertulis setelah pelaksanaan tugas ini, paling lambat seminggu setelah penugasan. </p>
             
        <table style="font-size:12pt;text-align:center;width:700px;margin-top:100px;position:absolute;">
            <tr>
                <td width="316" height="50" align="left">Sitoluama, ' . date('d-m-Y') . '
                    <br>
                    ' . $jabatansigner->jabatan . '<br>
                        <br><br><br>
                     ' . $namesigner->nama . '
                </td>

            </tr>
        </table>
    </table>
        ';
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

}
