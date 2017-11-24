<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\KategoriSuratCuti */

$this->title = $model->desc;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Surat Cutis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-surat-cuti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['kategori-surat-cuti-edit', 'id' => $model->kategori_surat_cuti_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['kategori-surat-cuti-del', 'id' => $model->kategori_surat_cuti_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kategori_surat_cuti_id',
            'desc',
            // 'deleted',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'deleted_at',
            // 'deleted_by',
        ],
    ]) ?>

</div>
