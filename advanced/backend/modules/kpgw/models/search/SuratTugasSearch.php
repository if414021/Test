<?php

namespace backend\modules\kpgw\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\kpgw\models\SuratTugas;

/**
 * SuratTugasSearch represents the model behind the search form about `backend\modules\kpgw\models\SuratTugas`.
 */
class SuratTugasSearch extends SuratTugas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surat_tugas_id', 'user_id', 'kategori_surat_tugas_id', 'transportasi_id', 'supir_id', 'signer_id', 'transportasi_berangkat', 'transportasi_kembali', 'deleted'], 'integer'],
            [['dosen_pendamping','tanggal_berangkat', 'tanggal_kembali', 'tanggal_mulai', 'tanggal_selesai', 'alasan_tugas', 'tujuan', 'rute_berangkat', 'rute_kembali', 'allowance', 'lokasi_inap', 'kebutuhan_khusus', 'tanggal_pengajuan', 'rincian_perjalanan_berangkat', 'rincian_perjalanan_kembali', 'status_approvingHRD', 'status_approvingWR', 'status_laporan', 'status_broadcast', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'], 'safe'],
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
        $query = SuratTugas::find();

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
            'surat_tugas_id' => $this->surat_tugas_id,
            'user_id' => $this->user_id,
            'dosen_pendamping' => $this->dosen_pendamping,
            'kategori_surat_tugas_id' => $this->kategori_surat_tugas_id,
            'transportasi_id' => $this->transportasi_id,
            'supir_id' => $this->supir_id,
            'signer_id' => $this->signer_id,
            'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'transportasi_berangkat' => $this->transportasi_berangkat,
            'transportasi_kembali' => $this->transportasi_kembali,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'alasan_tugas', $this->alasan_tugas])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'rute_berangkat', $this->rute_berangkat])
            ->andFilterWhere(['like', 'rute_kembali', $this->rute_kembali])
            ->andFilterWhere(['like', 'allowance', $this->allowance])
            ->andFilterWhere(['like', 'lokasi_inap', $this->lokasi_inap])
            ->andFilterWhere(['like', 'kebutuhan_khusus', $this->kebutuhan_khusus])
            ->andFilterWhere(['like', 'rincian_perjalanan_berangkat', $this->rincian_perjalanan_berangkat])
            ->andFilterWhere(['like', 'rincian_perjalanan_kembali', $this->rincian_perjalanan_kembali])
            ->andFilterWhere(['like', 'status_approvingHRD', $this->status_approvingHRD])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'status_laporan', $this->status_laporan])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by]);

        return $dataProvider;
    }

    public function search1($params,$status,$status1)
    {
        $this->user_id=$params;
        $this->status_approvingHRD=$status;
        $this->status_approvingWR=$status1;
        $query = SuratTugas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'surat_tugas_id' => $this->surat_tugas_id,
            'transportasi_id' => $this->transportasi_id,
            'kategori_surat_tugas_id' => $this->kategori_surat_tugas_id,
           // 'user_id' => $this->user_id,
            'supir_id' => $this->supir_id,
            'signer_id' => $this->signer_id,
            'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'transportasi_berangkat' => $this->transportasi_berangkat,
            'transportasi_kembali' => $this->transportasi_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
                ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'alasan_tugas', $this->alasan_tugas])
            ->andFilterWhere(['like', 'rute_berangkat', $this->rute_berangkat])
            ->andFilterWhere(['like', 'rute_kembali', $this->rute_kembali])
            ->andFilterWhere(['like', 'dosen_pendamping', $this->dosen_pendamping])
            ->andFilterWhere(['like', 'status_approvingHRD', $this->status_approvingHRD])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'allowance', $this->allowance])
            ->andFilterWhere(['like', 'status_laporan', $this->status_laporan])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'lokasi_inap', $this->lokasi_inap])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }

     public function searchbyhrd($params)
    {
        $this->status_approvingHRD=$params;
        $query = SuratTugas::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'surat_tugas_id' => $this->surat_tugas_id,
            'transportasi_id' => $this->transportasi_id,
            'kategori_surat_tugas_id' => $this->kategori_surat_tugas_id,
            'user_id' => $this->user_id,
            'supir_id' => $this->supir_id,
            'signer_id' => $this->signer_id,
            //'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'transportasi_berangkat' => $this->transportasi_berangkat,
            'transportasi_kembali' => $this->transportasi_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
                ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'alasan_tugas', $this->alasan_tugas])
            ->andFilterWhere(['like', 'rute_berangkat', $this->rute_berangkat])
            ->andFilterWhere(['like', 'rute_kembali', $this->rute_kembali])
            ->andFilterWhere(['like', 'dosen_pendamping', $this->dosen_pendamping])
            ->andFilterWhere(['like', 'status_approvingHRD', $this->status_approvingHRD])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'allowance', $this->allowance])
            ->andFilterWhere(['like', 'status_laporan', $this->status_laporan])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'lokasi_inap', $this->lokasi_inap])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);
         $query->andFilterWhere(['like', 'tanggal_berangkat', $this->tanggal_berangkat]); 
        return $dataProvider;
    }

    public function searchbyhrdFinal($params, $print)
    {
        $this->status_approvingHRD=$params;
        $this->status_approvingWR=$print;
        $query = SuratTugas::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'surat_tugas_id' => $this->surat_tugas_id,
            'transportasi_id' => $this->transportasi_id,
            'kategori_surat_tugas_id' => $this->kategori_surat_tugas_id,
            'user_id' => $this->user_id,
            'supir_id' => $this->supir_id,
            'signer_id' => $this->signer_id,
            //'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'transportasi_berangkat' => $this->transportasi_berangkat,
            'transportasi_kembali' => $this->transportasi_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
                ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'alasan_tugas', $this->alasan_tugas])
            ->andFilterWhere(['like', 'rute_berangkat', $this->rute_berangkat])
            ->andFilterWhere(['like', 'rute_kembali', $this->rute_kembali])
            ->andFilterWhere(['like', 'dosen_pendamping', $this->dosen_pendamping])
            ->andFilterWhere(['like', 'status_approvingHRD', $this->status_approvingHRD])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'allowance', $this->allowance])
            ->andFilterWhere(['like', 'status_laporan', $this->status_laporan])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'lokasi_inap', $this->lokasi_inap])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);
         $query->andFilterWhere(['like', 'tanggal_berangkat', $this->tanggal_berangkat]); 
        return $dataProvider;
    }

    public function searchbywr($params)
    {
        $this->status_approvingHRD=$params;
        $query = SuratTugas::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'surat_tugas_id' => $this->surat_tugas_id,
            'transportasi_id' => $this->transportasi_id,
            'kategori_surat_tugas_id' => $this->kategori_surat_tugas_id,
            'user_id' => $this->user_id,
            'supir_id' => $this->supir_id,
            'signer_id' => $this->signer_id,
            //'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'transportasi_berangkat' => $this->transportasi_berangkat,
            'transportasi_kembali' => $this->transportasi_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
                ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'alasan_tugas', $this->alasan_tugas])
            ->andFilterWhere(['like', 'rute_berangkat', $this->rute_berangkat])
            ->andFilterWhere(['like', 'rute_kembali', $this->rute_kembali])
            ->andFilterWhere(['like', 'dosen_pendamping', $this->dosen_pendamping])
            ->andFilterWhere(['like', 'status_approvingHRD', $this->status_approvingHRD])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'allowance', $this->allowance])
            ->andFilterWhere(['like', 'status_laporan', $this->status_laporan])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'lokasi_inap', $this->lokasi_inap])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);
         $query->andFilterWhere(['like', 'tanggal_berangkat', $this->tanggal_berangkat]); 
        return $dataProvider;
    }

    public function searchbywrfinal($params,$status)
    {
        $this->status_approvingHRD=$params;
        $this->status_approvingWR=$status;
        $query = SuratTugas::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'surat_tugas_id' => $this->surat_tugas_id,
            'transportasi_id' => $this->transportasi_id,
            'kategori_surat_tugas_id' => $this->kategori_surat_tugas_id,
            'user_id' => $this->user_id,
            'supir_id' => $this->supir_id,
            'signer_id' => $this->signer_id,
            //'tanggal_berangkat' => $this->tanggal_berangkat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tanggal_kembali' => $this->tanggal_kembali,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'transportasi_berangkat' => $this->transportasi_berangkat,
            'transportasi_kembali' => $this->transportasi_kembali,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
                ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'alasan_tugas', $this->alasan_tugas])
            ->andFilterWhere(['like', 'rute_berangkat', $this->rute_berangkat])
            ->andFilterWhere(['like', 'rute_kembali', $this->rute_kembali])
            ->andFilterWhere(['like', 'dosen_pendamping', $this->dosen_pendamping])
            ->andFilterWhere(['like', 'status_approvingHRD', $this->status_approvingHRD])
            ->andFilterWhere(['like', 'status_approvingWR', $this->status_approvingWR])
            ->andFilterWhere(['like', 'allowance', $this->allowance])
            ->andFilterWhere(['like', 'status_laporan', $this->status_laporan])
            ->andFilterWhere(['like', 'status_broadcast', $this->status_broadcast])
            ->andFilterWhere(['like', 'lokasi_inap', $this->lokasi_inap])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);
         $query->andFilterWhere(['like', 'tanggal_berangkat', $this->tanggal_berangkat]); 
        return $dataProvider;
    }

}
