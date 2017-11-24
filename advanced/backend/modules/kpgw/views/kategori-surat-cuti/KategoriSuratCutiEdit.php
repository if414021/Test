<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\KategoriSuratCuti */

$this->title = 'Update Kategori Surat Cuti: ' . $model->kategori_surat_cuti_id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Surat Cutis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kategori_surat_cuti_id, 'url' => ['view', 'id' => $model->kategori_surat_cuti_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-surat-cuti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
