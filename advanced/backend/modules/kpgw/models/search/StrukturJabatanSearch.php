<?php

namespace backend\modules\kpgw\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\kpgw\models\StrukturJabatan;

/**
 * StrukturJabatanSearch represents the model behind the search form about `backend\modules\kpgw\models\StrukturJabatan`.
 */
class StrukturJabatanSearch extends StrukturJabatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['struktur_jabatan_id', 'instansi_id', 'parent', 'is_multi_tenant', 'is_unit', 'deleted'], 'integer'],
            [['jabatan', 'inisial', 'deleted_at', 'deleted_by', 'updated_by', 'created_by'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = StrukturJabatan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'struktur_jabatan_id' => $this->struktur_jabatan_id,
            'instansi_id' => $this->instansi_id,
            'parent' => $this->parent,
            'is_multi_tenant' => $this->is_multi_tenant,
            'is_unit' => $this->is_unit,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'inisial', $this->inisial])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
