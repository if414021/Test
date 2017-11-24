<?php

namespace backend\modules\kpgw\models;

use Yii;

/**
 * This is the model class for table "inst_struktur_jabatan".
 *
 * @property integer $struktur_jabatan_id
 * @property integer $instansi_id
 * @property string $jabatan
 * @property integer $parent
 * @property string $inisial
 * @property integer $is_multi_tenant
 * @property integer $is_unit
 * @property integer $deleted
 * @property string $deleted_at
 * @property string $deleted_by
 * @property resource $updated_by
 * @property string $created_by
 *
 * @property HrdxPegawai[] $hrdxPegawais
 */
class StrukturJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inst_struktur_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instansi_id', 'parent', 'is_multi_tenant', 'is_unit', 'deleted'], 'integer'],
            [['deleted_at'], 'safe'],
            [['inisial'], 'string', 'max' => 45],
            [['jabatan'], 'string', 'max' => 100],
            [['deleted_by', 'updated_by', 'created_by'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'struktur_jabatan_id' => 'Struktur Jabatan ID',
            'instansi_id' => 'Instansi ID',
            'jabatan' => 'Jabatan',
            'parent' => 'Parent',
            'inisial' => 'Inisial',
            'is_multi_tenant' => 'Is Multi Tenant',
            'is_unit' => 'Is Unit',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasMany(Pegawai::className(), ['struktur_jabatan_id' => 'struktur_jabatan_id']);
    }
}
