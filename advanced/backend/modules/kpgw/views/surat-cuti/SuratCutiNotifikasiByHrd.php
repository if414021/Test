<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Surat Cuti yang diterima';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-index">
    <h1>Daftar Request Yang Diterima</h1>
    <br>
    <br>
    <?php
    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Approved',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider,
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
                        [
                            'header' => 'Action',
                            'format' => 'raw',
                            'value' => function($model, $key, $index) {
                                return Html::a('Rekap Data', array('surat-cuti-rekap-data', 'id' => $model->surat_cuti_id));
                            },
                                ],
                            ],
                        ]),
                        'active' => true,
                        'headerOptions' => ['style' => 'font-weight:bold'],
                        'options' => ['id' => 'viewhrd'],
                    ],
                    
            ]]);
            ?>
</div>
