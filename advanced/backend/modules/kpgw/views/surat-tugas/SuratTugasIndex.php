<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Semua Request ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-tugas-index">
    <div class="col-lg-12"><br></div>
    <br>
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
                        'status_laporan',
                        ],
                        ]),
                        'active' => true,
                        'headerOptions' => ['style' => 'font-weight:bold'],
                        'options' => ['id' => 'hrd'],
                    ],
                    [
                        'label' => 'Not Approve Yet',
                        'content' => GridView::widget([
                            'dataProvider' => $dataProvider5,
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
                                [
                                    'header' => 'Approved',
                                    'format' => 'raw',
                                    'value' => function($model, $key, $index) {
                                        return Html::a('Approved', array('surat-tugas-approved', 'id' => $model->surat_tugas_id));
                                    },
                                        ],
                                            [
                                    'header' => 'Reject',
                                    'format' => 'raw',
                                    'value' => function($model, $key, $index) {
                                        return Html::a('Reject', array('surat-tugas-reject', 'id' => $model->surat_tugas_id));
                                    },
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => 'Detail',
                                            'template' => '{view}',
                                            'buttons' => [
                                                'view' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                                'title' => Yii::t('yii', 'View'),
                                                                'class' => 'btn btn-warning',
                                                    ]);
                                                },],
                                                    'urlCreator' => function ($action, $model, $key, $index) {
                                                if ($action === 'view') {
                                                    $url = Url::toRoute(['/kpgw/surat-tugas/surat-tugas-view', 'id' => $model->surat_tugas_id]);
                                                    return $url;
                                                }
                                            }
                                                ],
                                            ],
                                        ]),
                                        'headerOptions' => ['style' => 'font-weight:bold'],
                                        'options' => ['id' => 'hrd1'],
                    ],
                    [
                                        'label' => 'Reject',
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
                                        'headerOptions' => ['style' => 'font-weight:bold'],
                                        'options' => ['id' => 'hrd3'],
                    ],
                            ]]);
                            ?>
</div>
