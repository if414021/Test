<?php

use yii\helpers\Html;
use backend\modules\kpgw\models\Pegawai;
/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\SuratTugas */
$user = Yii::$app->user->id; 
$pegawai = Pegawai::find()->where(['user_id' => $user])->one();

$this->title = 'Update Surat Tugas: ' . $pegawai['nama'];
$this->params['breadcrumbs'][] = ['label' => 'Surat Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->surat_tugas_id, 'url' => ['view', 'id' => $model->surat_tugas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surat-tugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
