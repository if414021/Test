<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpgw\models\search\KategoriSuratCutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Kategori Surat Cuti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-surat-cuti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> &nbsp;</span> Tambahkan Kategori Surat Cuti', ['kategori-surat-cuti-add'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'kategori_surat_cuti_id',
            'desc',
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
                                    $url = Url::toRoute(['/kpgw/kategori-surat-cuti/kategori-surat-cuti-view', 'id' => $model->kategori_surat_cuti_id]);
                                    return $url;
                                }
                            }
                                ],
            //'deleted',
            //'created_at',
            //'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
