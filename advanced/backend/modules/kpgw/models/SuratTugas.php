<?php

namespace backend\modules\kpgw\models;

use Yii;

/**
 * This is the model class for table "kpgw_surat_tugas".
 *
 * @property integer $surat_tugas_id
 * @property integer $user_id
 * @property integer $kategori_surat_tugas_id
 * @property integer $transportasi_id
 * @property integer $supir_id
 * @property integer $signer_id
 * @property string $tanggal_berangkat
 * @property string $tanggal_kembali
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $alasan_tugas
 * @property string $tujuan
 * @property string $rute_berangkat
 * @property string $rute_kembali
 * @property string $allowance
 * @property string $lokasi_inap
 * @property integer $transportasi_berangkat
 * @property integer $transportasi_kembali
 * @property string $kebutuhan_khusus
 * @property string $tanggal_pengajuan
 * @property string $rincian_perjalanan_berangkat
 * @property string $rincian_perjalanan_kembali
 * @property string $status_approvingHRD
 * @property string $status_approvingWR
 * @property string $status_laporan
 * @property string $status_broadcast
 * @property integer $deleted
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 *
 * @property KpgwLaporan[] $kpgwLaporans
 * @property KpgwRTransportasi $transportasiBerangkat
 * @property KpgwRKategoriSuratTugas $kategoriSuratTugas
 * @property KpgwRTransportasi $transportasiKembali
 * @property KpgwRSigner $signer
 * @property KpgwRSupir $supir
 * @property KpgwRTransportasi $transportasi
 * @property SysxUser $user
 */
class SuratTugas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpgw_surat_tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'kategori_surat_tugas_id', 'transportasi_id', 'supir_id', 'signer_id', 'transportasi_berangkat', 'transportasi_kembali', 'deleted'], 'integer'],
            [['tanggal_berangkat', 'tanggal_kembali', 'tanggal_mulai', 'tanggal_selesai', 'tanggal_pengajuan', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['alasan_tugas', 'kebutuhan_khusus', 'rincian_perjalanan_berangkat', 'rincian_perjalanan_kembali'], 'string', 'max' => 255],
            [['tujuan', 'rute_berangkat', 'rute_kembali', 'allowance'], 'string', 'max' => 50],
            [['lokasi_inap'], 'string', 'max' => 30],
            [['status_approvingHRD', 'status_approvingWR', 'status_laporan', 'status_broadcast'], 'string', 'max' => 20],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            [['transportasi_berangkat'], 'exist', 'skipOnError' => true, 'targetClass' => Transportasi::className(), 'targetAttribute' => ['transportasi_berangkat' => 'transportasi_id']],
            [['kategori_surat_tugas_id'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriSuratTugas::className(), 'targetAttribute' => ['kategori_surat_tugas_id' => 'kategori_surat_tugas_id']],
            [['transportasi_kembali'], 'exist', 'skipOnError' => true, 'targetClass' => Transportasi::className(), 'targetAttribute' => ['transportasi_kembali' => 'transportasi_id']],
            [['signer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Signer::className(), 'targetAttribute' => ['signer_id' => 'signer_id']],
            [['supir_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supir::className(), 'targetAttribute' => ['supir_id' => 'supir_id']],
            [['transportasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transportasi::className(), 'targetAttribute' => ['transportasi_id' => 'transportasi_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],

            [['kategori_surat_tugas_id'],'required', 'message'=>'Kategori surat tidak boleh kosong'],
            [['tujuan'],'required', 'message'=>'Tujuan tidak boleh kosong'],
            [['rute_berangkat'],'required', 'message'=>'Rute Berangkat tidak boleh kosong'],
            [['rute_kembali'],'required', 'message'=>'Rute Kembali tidak boleh kosong'],
            [['lokasi_inap'],'required', 'message'=>'Lokasi inap tidak boleh kosong'],
            [['tanggal_berangkat'],'required', 'message'=>'Tanggal berangkat tidak boleh kosong'],
            [['tanggal_mulai' ,],'required', 'message'=>'Tanggal mulai tidak boleh kosong'],
            [['tanggal_selesai',],'required', 'message'=>'Tanggal selesai tidak boleh kosong'],
            [['tanggal_kembali'],'required', 'message'=>'Tanggal kembali tidak boleh kosong'],
            [['status_approvingHRD', 'status_approvingWR', 'status_laporan', 'status_broadcast', 'created_by', 'updated_by'], 'string', 'max' => 20],
            [['allowance'], 'string', 'max' => 50],
            [['lokasi_inap'], 'string', 'max' => 200],
            [['kebutuhan_khusus'], 'string', 'max' => 100],
            [['rincian_perjalanan_berangkat'], 'string', 'max' => 500],
            [['rincian_perjalanan_kembali'], 'string', 'max' => 500],
            ['tanggal_mulai','compare', 'compareAttribute'=>'tanggal_berangkat','operator'=>'>','message'=>'Tanggal mulai harus lebih besar dari tanggal berangkat'],
            ['tanggal_selesai','compare', 'compareAttribute'=>'tanggal_mulai','operator'=>'>','message'=>'Tanggal selesai harus lebih besar dari tanggal mulai'],
            ['tanggal_kembali','compare', 'compareAttribute'=>'tanggal_selesai','operator'=>'>','message'=>'Tanggal kembali harus lebih besar dari tanggal selesai']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'surat_tugas_id' => 'Surat Tugas ID',
            'user_id' => 'Nama Dosen',
            'kategori_surat_tugas_id' => 'Kategori Surat Tugas',
            'transportasi_id' => 'Transportasi ID',
            'supir_id' => 'Supir ID',
            'signer_id' => 'Signer ID',
            'tanggal_berangkat' => 'Tanggal Berangkat',
            'tanggal_kembali' => 'Tanggal Kembali',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'alasan_tugas' => 'Alasan Bertugas',
            'tujuan' => 'Tujuan',
            'rute_berangkat' => 'Rute Berangkat',
            'rute_kembali' => 'Rute Kembali',
            'dosen_pendamping' => 'Nama Dosen Pendamping',
            'allowance' => 'Allowance',
            'lokasi_inap' => 'Lokasi Inap',
            'transportasi_berangkat' => 'Transportasi Berangkat',
            'transportasi_kembali' => 'Transportasi Kembali',
            'kebutuhan_khusus' => 'Kebutuhan Khusus',
            'tanggal_pengajuan' => 'Tanggal Pengajuan',
            'rincian_perjalanan_berangkat' => 'Rincian Perjalanan Berangkat',
            'rincian_perjalanan_kembali' => 'Rincian Perjalanan Kembali',
            'status_approvingHRD' => 'Status Approving Hrd',
            'status_approvingWR' => 'Status Approving Wr',
            'status_laporan' => 'Status Laporan',
            'status_broadcast' => 'Status Broadcast',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaporan()
    {
        return $this->hasMany(Laporan::className(), ['surat_tugas_id' => 'surat_tugas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportasiBerangkat()
    {
        return $this->hasOne(Transportasi::className(), ['transportasi_id' => 'transportasi_berangkat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategoriSuratTugas()
    {
        return $this->hasOne(KategoriSuratTugas::className(), ['kategori_surat_tugas_id' => 'kategori_surat_tugas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportasiKembali()
    {
        return $this->hasOne(Transportasi::className(), ['transportasi_id' => 'transportasi_kembali']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSigner()
    {
        return $this->hasOne(Signer::className(), ['signer_id' => 'signer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupir()
    {
        return $this->hasOne(Supir::className(), ['supir_id' => 'supir_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportasi()
    {
        return $this->hasOne(Transportasi::className(), ['transportasi_id' => 'transportasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    public function getUserpegawai()
    {
        return $this->hasOne(Pegawai::className(), ['user_id' => 'user_id']);
    }

    public function requestingViewbyHRD() {
        $temp = SuratTugas::findAll(array('status_approvingHRD' => 'Requesting'));
        $coun = count($temp);
        return $coun;
    }

    public function statusApproveUser(){
        $temp = SuratTugas::findAll(array('status_approvingHRD' => 'Approved','status_approvingWR' => 'Final_Approving','user_id'=>Yii::$app->user->identity->id));
        $coun = count($temp);
        return $coun;
    }

    public function statusApprovebywr() {
        $temp = SuratTugas::findAll(array('status_approvingHRD' => 'Approved'));
        $jumlah = count($temp);
        return $jumlah;
    }

    public function statusRequesting() {
        $temp = SuratTugas::findAll(array('status_approvingHRD' => 'Requesting','user_id'=>Yii::$app->user->identity->id));
        $coun = count($temp);
        return $coun;
    }
    
    public function statusReject() {
        $temp = SuratTugas::findAll(array('status_approvingHRD' => 'Reject', 'status_approvingWR' => 'Waiting','user_id'=>Yii::$app->user->identity->id));
        $coun = count($temp);
        return $coun;
    }
    //Batasan Joyce
    public function statusRejectbyHRD() {
        $temp = SuratTugas::findAll(array('status_approvingHRD' => 'Reject','user_id'=>Yii::$app->user->identity->id));
        $jumlah = count($temp);
        return $jumlah;
    }

    public function cekLaporan($surat_tugas_id='') {
        $temp = SuratTugas::findOne($surat_tugas_id);
        if ($temp->status_laporan==0)
            return false;
        else 
            return true;
     
    }

}
