<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\kpgw\models\KategoriSuratTugas;
use backend\modules\kpgw\models\User;
use backend\modules\kpgw\models\Pegawai;
use backend\modules\kpgw\models\Transportasi;
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
        $form->field($model, 'kategori_surat_tugas_id')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(KategoriSuratTugas::find()->all(), 'kategori_surat_tugas_id', 'desc'),
            'language' => 'en',
            'options' => ['placeholder' => 'Pilih kategori surat..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        <?=
        $form->field($model, 'user_id')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Pegawai::find()->where(['user_id' => $model->user_id])->all(), 'user_id', 'nama'),
            'language' => 'en',
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?> 
        <?=
        $form->field($model, 'dosen_pendamping')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Pegawai::find()->all(), 'user_id', 'nama'),
            'language' => 'en',
            'options' => ['multiple' => 'true', 'placeholder' => 'Pilih nama Pegawai yang bertugas'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

        ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'alasan_tugas')->textarea(['maxlength' => true]) ?>


        <?=
        $form->field($model, 'tujuan')->textInput(
                [
                    'maxlength' => true,
                    'placeholder' => 'Kantor PLN UPB I di Medan',
        ])
        ?>

        <?=
        $form->field($model, 'lokasi_inap')->textInput(
                [
                    'maxlength' => true,
                    'placeholder' => 'Hotel Inna Medan',
        ])
        ?>


    </div>

    


    <div class="col-md-6 well">
        <h4>Keberangkatan</h4>
        <div class="col-md-6">
            <?=
            $form->field($model, 'rute_berangkat')->textInput(
                    [
                        'maxlength' => true,
                        'placeholder' => 'IT Del - Medan',
            ])
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($model, 'transportasi_berangkat')->widget(
                    Select2::classname(), [
                'data' => ArrayHelper::map(Transportasi::find()->all(), 'transportasi_id', 'desc'),
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih alat transportasi..'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?> 
        </div>
        <div class="col-md-12">
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

        <div class="col-md-12">
            <?= $form->field($model, 'rincian_perjalanan_berangkat')->textarea(
            [
                'maxlength' => true,
                'placeholder' => 'Tuliskan secara detail transportasi keberangkatan yang anda gunakan saat ingin / sedang melaksanakan tugas',
            ]) ?> 
        </div>
    </div>

    <div class="col-md-6 well">
        <h4>Kepulangan</h4>
        <div class="col-md-6">
            <?=
            $form->field($model, 'rute_kembali')->textInput(
                    [
                        'maxlength' => true,
                        'placeholder' => 'IT Del - Medan',
            ])
            ?>
        </div>
        <div class="col-md-6">
            <?=
            $form->field($model, 'transportasi_kembali')->widget(
                    Select2::classname(), [
                'data' => ArrayHelper::map(Transportasi::find()->all(), 'transportasi_id', 'desc'),
                'language' => 'en',
                'options' => ['placeholder' => 'Pilih alat transportasi..'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-md-12">
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
        <div class="col-md-12">
            <?=
            $form->field($model, 'rincian_perjalanan_kembali')->textarea(
            [
                'maxlength' => true,
                'placeholder' => 'Tuliskan secara detail transportasi kepulangan yang anda gunakan saat sedang / telah melaksanakan tugas',
            ])
            ?> 
        </div>


    </div>

    <div class="col-md-6">
        <?php
        echo $form->field($model, 'tanggal_mulai')->widget(
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

         <?=
        $form->field($model, 'kebutuhan_khusus')->textarea(
                [
                    'maxlength' => true,
                    'placeholder' => 'Tuliskan hal-hal penting yang anda butuhkan saat ingin/sedang melaksanakan tugas',
                ]
        )
        ?> 
        
    </div>
    <div class="col-md-6">
        <?php
        echo $form->field($model, 'tanggal_selesai')->widget(
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

    <div class="form-group col-md-10">
    <?= Html::submitButton($model->isNewRecord ? 'Request' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>
</div>





<?php ActiveForm::end(); ?>


