<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\kpgw\models\search\SignerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Signer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> &nbsp;</span> Tambahkan Signer', ['signer-add'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'signer_id',
            'desc',
            [
                            'attribute' => 'user_id',
                            'value' => 'userpegawai.nama'
                        ],
           // 'user_id',
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
                                    $url = Url::toRoute(['/kpgw/signer/signer-view', 'id' => $model->signer_id]);
                                    return $url;
                                }
                            }
                                ],
            //'deleted',
            //'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
