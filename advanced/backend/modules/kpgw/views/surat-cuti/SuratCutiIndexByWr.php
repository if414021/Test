<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Request Surat Cuti Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-index">
    <?php echo Html::beginForm(['index']); ?>
    <?php
    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Not Approve Yet',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider8,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'kategori_surat_cuti_id',
                            'value' => 'kategoriSuratCuti.desc'
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
                        'alasan',
                        'jumlah_cuti',
                        'status_approvingAtasan',
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
                            'attribute' => 'kategori_surat_cuti_id',
                            'value' => 'kategoriSuratCuti.desc'
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
                        'alasan',
                        'status_approvingAtasan',
                    ],
                ]),
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'hrd3'],
            ],
    ]]);
    ?>

</div>