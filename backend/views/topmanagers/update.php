<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Topmanagers $model */

$this->title = 'Update Topmanagers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Topmanagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topmanagers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
