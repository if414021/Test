<?php

namespace backend\modules\kpgw\models;

use Yii;

/**
 * This is the model class for table "kpgw_laporan".
 *
 * @property integer $laporan_id
 * @property integer $surat_tugas_id
 * @property integer $user_id
 * @property string $file_laporan
 * @property string $tanggal_pelaporan
 * @property integer $deleted
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 *
 * @property KpgwSuratTugas $suratTugas
 * @property SysxUser $user
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'kpgw_laporan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surat_tugas_id', 'user_id', 'deleted'], 'integer'],
            [['file_laporan'], 'file'],
            [['tanggal_pelaporan', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            [['surat_tugas_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuratTugas::className(), 'targetAttribute' => ['surat_tugas_id' => 'surat_tugas_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'laporan_id' => 'Laporan ID',
            'surat_tugas_id' => 'Surat Tugas ID',
            'user_id' => 'User ID',
            'file_laporan' => 'File Laporan',
            'tanggal_pelaporan' => 'Tanggal Pelaporan',
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
    public function getSuratTugas()
    {
        return $this->hasOne(SuratTugas::className(), ['surat_tugas_id' => 'surat_tugas_id']);
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
}
