<?php

namespace backend\modules\kpgw\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\kpgw\models\SuratCuti;

/**
 * SuratCutiSearch represents the model behind the search form about `backend\modules\kpgw\models\SuratCuti`.
 */
class SuratCutiSearch extends SuratCuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surat_cuti_id', 'user_id', 'atasan_pegawai', 'tanda_tangan_id','kategori_surat_cuti_id', 'deleted' , 'jumlah_cuti'], 'integer'],
            [['tanggal_berangkat', 'tanggal_kembali', 'alasan', 'pengalihan_tugas', 'status_approvingAtasan', 'status_approvingWR', 'status_broadcast', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'], 'safe'],
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
        $query = SuratCuti::find();

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
            'surat_cuti_id' => $this->surat_cuti_id,
            'user_id' => $this->user_id,
            'atasan_pegawai' => $this->atasan_pegawai,
            'tanda_tangan_id' => $this->tanda_tangan_id,
            'kategori_surat_cuti_id' => $this->kategori_surat_cuti_id,
            'jumlah_cuti' => $this->jumlah_cuti,
            'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_kembali' => $this->tanggal_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'alasan', $this->alasan])
            ->andFilterWhere(['like', 'pengalihan_tugas', $this->pengalihan_tugas])
            ->andFilterWhere(['like', 'status_approvingAtasan', $this->status_approvingAtasan])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }

    public function search1($params,$status,$status1)
    {   
        $this->user_id=$params;
        $this->status_approvingAtasan=$status;
        $this->status_approvingWR=$status1;
        $query = SuratCuti::find();

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
            'surat_cuti_id' => $this->surat_cuti_id,
            'user_id' => $this->user_id,
            'atasan_pegawai' => $this->atasan_pegawai,
            'tanda_tangan_id' => $this->tanda_tangan_id,
            'kategori_surat_cuti_id' => $this->kategori_surat_cuti_id,
            'jumlah_cuti' => $this->jumlah_cuti,
            'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_kembali' => $this->tanggal_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'alasan', $this->alasan])
            ->andFilterWhere(['like', 'pengalihan_tugas', $this->pengalihan_tugas])
            ->andFilterWhere(['like', 'status_approvingAtasan', $this->status_approvingAtasan])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }

    public function searchbywr($params, $status)
    {
        $this->status_approvingWR=$status;
        $this->status_approvingAtasan=$params;
        $query = SuratCuti::find();

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
            'surat_cuti_id' => $this->surat_cuti_id,
            'user_id' => $this->user_id,
            'atasan_pegawai' => $this->atasan_pegawai,
            'tanda_tangan_id' => $this->tanda_tangan_id,
            'kategori_surat_cuti_id' => $this->kategori_surat_cuti_id,
            'jumlah_cuti' => $this->jumlah_cuti,
            'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_kembali' => $this->tanggal_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'alasan', $this->alasan])
            ->andFilterWhere(['like', 'pengalihan_tugas', $this->pengalihan_tugas])
            ->andFilterWhere(['like', 'status_approvingAtasan', $this->status_approvingAtasan])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }

    public function searchbyatasan($params)
    {
        $this->status_approvingAtasan=$params;
        $query = SuratCuti::find()->where(['atasan_pegawai' => Yii::$app->user->identity->id]);

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
            'surat_cuti_id' => $this->surat_cuti_id,
            'user_id' => $this->user_id,
            'atasan_pegawai' => $this->atasan_pegawai,
            'tanda_tangan_id' => $this->tanda_tangan_id,
            'kategori_surat_cuti_id' => $this->kategori_surat_cuti_id,
            'jumlah_cuti' => $this->jumlah_cuti,
            'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_kembali' => $this->tanggal_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'alasan', $this->alasan])
            ->andFilterWhere(['like', 'pengalihan_tugas', $this->pengalihan_tugas])
            ->andFilterWhere(['like', 'status_approvingAtasan', $this->status_approvingAtasan])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }


}
