<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\kpgw\models\Pegawai;
/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\SuratCuti */

$user = Yii::$app->user->id; 
$pegawai = Pegawai::find()->where(['user_id' => $user])->one();

$this->title = 'Surat Cuti '.$pegawai['nama'];
$this->params['breadcrumbs'][] = ['label' => 'Surat Cutis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['surat-cuti-edit', 'id' => $model->surat_cuti_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['surat-cuti-del', 'id' => $model->surat_cuti_id], [
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
            // 'surat_cuti_id',
            // 'user_id',
            array(
                'label' => $model->userpegawai->getAttributeLabel('Dosen yang bertugas'),
                'value' => $model->userpegawai->nama
            ),
            // 'kategori_surat_cuti_id',
            array(
                'label' => $model->kategoriSuratCuti->getAttributeLabel('Kategori Surat Cuti'),
                'value' => $model->kategoriSuratCuti->desc
            ),
            'tanggal_berangkat',
            'tanggal_kembali',
            'alasan',
            'jumlah_cuti',
            'pengalihan_tugas',
            // 'status_approvingAtasan',
            // 'status_approvingWR',
            // 'status_broadcast',
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
