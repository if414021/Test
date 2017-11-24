<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\kpgw\models\KpgwRRole */

$this->title = 'Create Kpgw Rrole';
$this->params['breadcrumbs'][] = ['label' => 'Kpgw Rroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpgw-rrole-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
