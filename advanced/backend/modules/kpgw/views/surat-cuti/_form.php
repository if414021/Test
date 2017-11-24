<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\kpgw\models\KategoriSuratCuti;
use backend\modules\kpgw\models\User;
use backend\modules\kpgw\models\Pegawai;
use kartik\select2\Select2;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\SuratTugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">
<div class="surat-tugas-form">
     
     <?php $form = ActiveForm::begin(['options' => ['encytpe' => 'multipart/form-data']]); ?>

    <div class="col-md-6">
        <?=
        $form->field($model, 'kategori_surat_cuti_id')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(KategoriSuratCuti::find()->all(), 'kategori_surat_cuti_id', 'desc'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih kategori surat..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>

        <?php
        echo $form->field($model, 'tanggal_berangkat')->widget(
                DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Enter event time ...'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy/mm/dd hh:ii:ss',
                'todayHighlight' => true,
                'startDate' => date('Y-m-d h:m:s')
            ]
        ]);
        ?>
        
    </div>

    <div class="col-md-6">
        <?=
        $form->field($model, 'atasan_pegawai')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Pegawai::find()->all(), 'user_id', 'nama'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih Atasan Pegawai'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

        ?>

        <?php
        echo $form->field($model, 'tanggal_kembali')->widget(
                DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Enter event time ...'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy/mm/dd hh:ii:ss',
                'todayHighlight' => true,
                'startDate' => date('Y-m-d h:m:s')
            ]
        ]);
        ?> 
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'alasan')->textarea(['maxlength' => true]) ?>
        
    </div>
    <div class="col-md-6">
        <?=
        $form->field($model, 'pengalihan_tugas')->textarea(
                [
                    'maxlength' => true,
                    'placeholder' => 'Tuliskan hal-hal penting yang anda butuhkan saat ingin/sedang melaksanakan cuti',
                ]
        )
        ?> 
    </div>

    <div class="form-group col-md-10">
    <?= Html::submitButton($model->isNewRecord ? 'Kirim' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>
</div>





<?php ActiveForm::end(); ?>


