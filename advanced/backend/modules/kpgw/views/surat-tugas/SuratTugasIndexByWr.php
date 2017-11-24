<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Request Surat Tugas Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-tugas-index">
    <?php echo Html::beginForm(['index']); ?>
    <?php
    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Approved',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider4,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'kategori_surat_tugas_id',
                            'value' => 'kategoriSuratTugas.desc'
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
                        'alasan_tugas',
                        'status_approvingHRD',
                        'status_approvingWR',
                    ],
                ]),
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'hrd1'],
            ],
            [
                'label' => 'Not Approve Yet',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider8,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'kategori_surat_tugas_id',
                            'value' => 'kategoriSuratTugas.desc'
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
                        'alasan_tugas',
                        'status_approvingHRD',
                        'status_approvingWR',
                    ],
                ]),
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'hrd1'],
            ],
            [
                'label' => 'Reject',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider9,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'kategori_surat_tugas_id',
                            'value' => 'kategoriSuratTugas.desc'
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
                        'alasan_tugas',
                        'status_approvingHRD',
                    ],
                ]),
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'hrd3'],
            ],
    ]]);
    ?>

</div>