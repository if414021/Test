<?php

namespace backend\modules\kpgw\models;

use Yii;

/**
 * This is the model class for table "hrdx_r_kuota_cuti_tahunan".
 *
 * @property integer $kuota_cuti_tahunan_id
 * @property integer $lama_bekerja_min
 * @property integer $lama_bekerja_max
 * @property string $kuota
 * @property string $satuan
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $created_at
 * @property string $created_by
 *
 * @property HrdxPegawai[] $hrdxPegawais
 */
class KuotaCutiTahunan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrdx_r_kuota_cuti_tahunan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lama_bekerja_min', 'lama_bekerja_max', 'deleted'], 'integer'],
            [['deleted_at', 'updated_at', 'created_at'], 'safe'],
            [['kuota', 'satuan'], 'string', 'max' => 20],
            [['deleted_by', 'updated_by', 'created_by'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kuota_cuti_tahunan_id' => 'Kuota Cuti Tahunan ID',
            'lama_bekerja_min' => 'Lama Bekerja Min',
            'lama_bekerja_max' => 'Lama Bekerja Max',
            'kuota' => 'Kuota',
            'satuan' => 'Satuan',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasMany(Pegawai::className(), ['kuota_cuti_tahunan_id' => 'kuota_cuti_tahunan_id']);
    }
}
