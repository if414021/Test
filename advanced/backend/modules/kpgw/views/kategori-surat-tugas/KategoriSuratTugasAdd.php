<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\KategoriSuratTugas */

$this->title = 'Create Kategori Surat Tugas';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Surat Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-surat-tugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
