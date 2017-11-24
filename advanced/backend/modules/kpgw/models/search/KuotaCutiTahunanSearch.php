<?php

namespace backend\modules\kpgw\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\kpgw\models\KuotaCutiTahunan;

/**
 * KuotaCutiTahunanSearch represents the model behind the search form about `backend\modules\kpgw\models\KuotaCutiTahunan`.
 */
class KuotaCutiTahunanSearch extends KuotaCutiTahunan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kuota_cuti_tahunan_id', 'lama_bekerja_min', 'lama_bekerja_max', 'deleted'], 'integer'],
            [['kuota', 'satuan', 'deleted_at', 'deleted_by', 'updated_at', 'updated_by', 'created_at', 'created_by'], 'safe'],
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
        $query = KuotaCutiTahunan::find();

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
            'kuota_cuti_tahunan_id' => $this->kuota_cuti_tahunan_id,
            'lama_bekerja_min' => $this->lama_bekerja_min,
            'lama_bekerja_max' => $this->lama_bekerja_max,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'kuota', $this->kuota])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
