<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\SuratCuti */

$this->title = 'Form Request Surat Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Surat Cutis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-cuti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
