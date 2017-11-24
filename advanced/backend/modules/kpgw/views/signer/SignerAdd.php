<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\kpgw\models\Signer */

$this->title = 'Create Signer';
$this->params['breadcrumbs'][] = ['label' => 'Signers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
