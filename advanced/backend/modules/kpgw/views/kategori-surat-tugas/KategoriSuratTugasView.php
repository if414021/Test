<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\KategoriSuratTugas */

$this->title = $model->kategori_surat_tugas_id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Surat Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-surat-tugas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['kategori-surat-tugas-edit', 'id' => $model->kategori_surat_tugas_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['kategori-surat-tugas-del', 'id' => $model->kategori_surat_tugas_id], [
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
            'kategori_surat_tugas_id',
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
