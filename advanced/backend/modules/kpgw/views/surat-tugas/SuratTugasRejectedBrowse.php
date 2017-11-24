<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'View Approved Surat Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-tugas-index">
    <h1>Daftar Request Yang Ditolak</h1>
    <br>
    <?php
    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Rejected',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider6,
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
                'active' => true,
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'viewhrdtolak'],
            ]
    ]]);
    ?>
</div>