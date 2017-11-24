<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Surat Cuti yang diterima oleh Atasan Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-index">
    <h1>Daftar Request Yang Diterima Atasan Pegawai</h1>
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
                            'header' => 'Finale_Status',
                            'format' => 'raw',
                            'value' => function($model, $key, $index) {
                                if($model->status_approvingWR == "Final_Approving"){
                                    return '-';
                                }else{
                                    return Html::a('Final Approval', array('surat-cuti-approved-by-wr', 'id' => $model->surat_cuti_id));
                                }
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
