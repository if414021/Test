<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\search\SuratTugasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-tugas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'surat_tugas_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'kategori_surat_tugas_id') ?>

    <?= $form->field($model, 'transportasi_id') ?>

    <?= $form->field($model, 'supir_id') ?>

    <?php // echo $form->field($model, 'signer_id') ?>

    <?php // echo $form->field($model, 'tanggal_berangkat') ?>

    <?php // echo $form->field($model, 'tanggal_kembali') ?>

    <?php // echo $form->field($model, 'tanggal_mulai') ?>

    <?php // echo $form->field($model, 'tanggal_selesai') ?>

    <?php // echo $form->field($model, 'alasan_tugas') ?>

    <?php // echo $form->field($model, 'tujuan') ?>

    <?php // echo $form->field($model, 'rute') ?>

    <?php // echo $form->field($model, 'allowance') ?>

    <?php // echo $form->field($model, 'lokasi_inap') ?>

    <?php // echo $form->field($model, 'transportasi_berangkat') ?>

    <?php // echo $form->field($model, 'transportasi_kembali') ?>

    <?php // echo $form->field($model, 'kebutuhan_khusus') ?>

    <?php // echo $form->field($model, 'tanggal_pengajuan') ?>

    <?php // echo $form->field($model, 'rincian_perjalanan_berangkat') ?>

    <?php // echo $form->field($model, 'rincian_perjalanan_kembali') ?>

    <?php // echo $form->field($model, 'status_approvingHRD') ?>

    <?php // echo $form->field($model, 'status_approvingWR') ?>

    <?php // echo $form->field($model, 'status_laporan') ?>

    <?php // echo $form->field($model, 'status_broadcast') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
