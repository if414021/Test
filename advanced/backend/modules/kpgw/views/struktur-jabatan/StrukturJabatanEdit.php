<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\StrukturJabatan */

$this->title = 'Update Struktur Jabatan: ' . $model->struktur_jabatan_id;
$this->params['breadcrumbs'][] = ['label' => 'Struktur Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->struktur_jabatan_id, 'url' => ['view', 'id' => $model->struktur_jabatan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="struktur-jabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
