<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\tabs\TabsX;

use backend\modules\kpgw\models\Pegawai;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\sist\models\search\SistRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$user = Yii::$app->user->id; 
$pegawai = Pegawai::find()->where(['user_id' => $user])->one();
$this->title = 'Daftar Semua Request oleh ' . ' ' . $pegawai['nama'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-tugas-index">
    <br>
    <?php
    if (Yii::$app->session->hasFlash('success')) {
        echo "<div class='alert alert-success' role='alert'>".Yii::$app->session->getFlash('success')."</div>";
    }?>
    
    <?php
    $approve = backend\modules\kpgw\models\SuratCuti::statusApproveUser();
    $requesting = backend\modules\kpgw\models\SuratCuti::statusRequesting();
    $reject = backend\modules\kpgw\models\SuratCuti::statusReject();
    $rejectbyAtasan = backend\modules\kpgw\models\SuratCuti::statusRejectbyAtasan();
    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                
                'label' => 'Approved (' . $approve . ')',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider1,
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
                        'status_approvingWR',
                        [
                            'header' => 'Action',
                            'format' => 'raw',
                            
                            'value' => function($model, $key, $index) {
                                    return Html::a( 'Cetak Surat', array( '#', 'id' => $model->surat_cuti_id));
                            },
                        ],
                        
                    ],
                ]),
                'active' => true,
                'headerOptions' => ['style' => 'font-weight:bold'],
                'options' => ['id' => 'myveryownID4'],
            ],
            [
                'label' => 'Not Approve Yet (' . $requesting . ')',
                'content' => GridView::widget([
                    'dataProvider' => $dataProvider2,
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
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
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
                                    $url = Url::toRoute(['/kpgw/surat-cuti/surat-cuti-view', 'id' => $model->surat_cuti_id]);
                                    return $url;
                                }
                            }
                                ],
                            ],
                        ]),
                        'headerOptions' => ['style' => 'font-weight:bold'],
                        'options' => ['id' => 'myveryownID3'],
            ],
            [
                        'label' => 'Reject (' . $reject . ')',
                        'content' => GridView::widget([
                            'dataProvider' => $dataProvider3,
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
                                'status_approvingWR',
                            ],
                        ]),
                        'headerOptions' => ['style' => 'font-weight:bold'],
                        'options' => ['id' => 'myveryownID2'],
            ],
            ]]);
            ?>

</div>