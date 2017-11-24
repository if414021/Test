<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'View finale Approving By WR ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sist-request-index">
    <h1>Daftar Surat Tugas Yang Diterima oleh HRD dan WR</h1>
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
                        'active' => true,
                        'headerOptions' => ['style' => 'font-weight:bold'],
                        'options' => ['id' => 'hrd'],
                    ],
            ]]);
            ?>

</div>

