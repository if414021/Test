<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\KategoriSuratTugas */

$this->title = 'Update Kategori Surat Tugas: ' . $model->kategori_surat_tugas_id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Surat Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategori_surat_tugas_id, 'url' => ['view', 'id' => $model->kategori_surat_tugas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-surat-tugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
