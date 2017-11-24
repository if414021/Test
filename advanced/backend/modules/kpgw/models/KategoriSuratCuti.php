<?php

namespace backend\modules\kpgw\models;

use Yii;

/**
 * This is the model class for table "kpgw_r_kategori_surat_cuti".
 *
 * @property integer $kategori_surat_cuti_id
 * @property string $desc
 * @property integer $deleted
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $deleted_at
 * @property string $deleted_by
 *
 * @property KpgwSuratCuti[] $kpgwSuratCutis
 */
class KategoriSuratCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpgw_r_kategori_surat_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deleted'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['desc'], 'string', 'max' => 30],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kategori_surat_cuti_id' => 'Kategori Surat Cuti ID',
            'desc' => 'Desc',
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
    public function getSuratCuti()
    {
        return $this->hasMany(SuratCuti::className(), ['kategori_surat_cuti_id' => 'kategori_surat_cuti_id']);
    }
}
