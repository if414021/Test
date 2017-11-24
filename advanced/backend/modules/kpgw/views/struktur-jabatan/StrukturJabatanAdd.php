<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\StrukturJabatan */

$this->title = 'Create Struktur Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-jabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
