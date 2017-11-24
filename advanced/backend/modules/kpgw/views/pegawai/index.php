<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpgw\models\search\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> &nbsp;</span> Tambahkan Pegawai', ['pegawai-add'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            'nip',
            'email',

            [
                'label' => 'Posisi/Jabatan',
                'attribute' => 'struktur_jabatan_id',
                'value' => 'strukturJabatan.jabatan'
            ],
            'kuota_cuti_tahunan',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{view}',
                'buttons' => [
//view button
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'title' => Yii::t('yii', 'Lihat'),
                                    'class' => 'btn btn-warning',
                        ]);
                    },
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'view') {
                                $url = Url::toRoute(['/kpgw/pegawai/pegawai-view', 'id' => $model->pegawai_id]);
                                return $url;
                            }
                            // if ($action === 'update') {
                            //     $url = Url::toRoute(['/sist/sist-r-user/useredit', 'id' => $model->sist_r_user_id]);
                            //     return $url;
                            // }
                        }
                    ],

            // 'pegawai_id',
            // 'profile_old_id',
            // 'nama',
            // 'nip',
            // 'kpt_no',
            // 'kbk_id',
            // 'ref_kbk_id',
            // 'alias',
            // 'posisi',
            // 'tempat_lahir',
            // 'tgl_lahir',
            // 'agama_id',
            // 'jenis_kelamin_id',
            // 'golongan_darah_id',
            // 'hp',
            // 'telepon',
            // 'alamat',
            // 'alamat_libur',
            // 'kecamatan',
            // 'kota',
            // 'kabupaten_id',
            // 'kode_pos',
            // 'no_ktp',
            // 'email:ntext',
            // 'ext_num',
            // 'study_area_1',
            // 'study_area_2',
            // 'jabatan',
            // 'jabatan_akademik_id',
            // 'gbk_1',
            // 'gbk_2',
            // 'status_ikatan_kerja_pegawai_id',
            // 'status_akhir',
            // 'status_aktif_pegawai_id',
            // 'tanggal_masuk',
            // 'tanggal_keluar',
            // 'nama_bapak',
            // 'nama_ibu',
            // 'status',
            // 'status_marital_id',
            // 'nama_p',
            // 'tgl_lahir_p',
            // 'tmp_lahir_p',
            // 'pekerjaan_ortu',
            // 'user_id',
            // 'role_id',
            // 'struktur_jabatan_id',
            // 'kuota_cuti_tahunan_id',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
