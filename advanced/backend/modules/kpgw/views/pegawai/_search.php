<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\search\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pegawai_id') ?>

    <?= $form->field($model, 'profile_old_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'kpt_no') ?>

    <?php // echo $form->field($model, 'kbk_id') ?>

    <?php // echo $form->field($model, 'ref_kbk_id') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'posisi') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'agama_id') ?>

    <?php // echo $form->field($model, 'jenis_kelamin_id') ?>

    <?php // echo $form->field($model, 'golongan_darah_id') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'alamat_libur') ?>

    <?php // echo $form->field($model, 'kecamatan') ?>

    <?php // echo $form->field($model, 'kota') ?>

    <?php // echo $form->field($model, 'kabupaten_id') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'no_ktp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'ext_num') ?>

    <?php // echo $form->field($model, 'study_area_1') ?>

    <?php // echo $form->field($model, 'study_area_2') ?>

    <?php // echo $form->field($model, 'jabatan') ?>

    <?php // echo $form->field($model, 'jabatan_akademik_id') ?>

    <?php // echo $form->field($model, 'gbk_1') ?>

    <?php // echo $form->field($model, 'gbk_2') ?>

    <?php // echo $form->field($model, 'status_ikatan_kerja_pegawai_id') ?>

    <?php // echo $form->field($model, 'status_akhir') ?>

    <?php // echo $form->field($model, 'status_aktif_pegawai_id') ?>

    <?php // echo $form->field($model, 'tanggal_masuk') ?>

    <?php // echo $form->field($model, 'tanggal_keluar') ?>

    <?php // echo $form->field($model, 'nama_bapak') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'status_marital_id') ?>

    <?php // echo $form->field($model, 'nama_p') ?>

    <?php // echo $form->field($model, 'tgl_lahir_p') ?>

    <?php // echo $form->field($model, 'tmp_lahir_p') ?>

    <?php // echo $form->field($model, 'pekerjaan_ortu') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'role_id') ?>

    <?php // echo $form->field($model, 'struktur_jabatan_id') ?>

    <?php // echo $form->field($model, 'kuota_cuti_tahunan_id') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
