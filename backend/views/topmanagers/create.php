<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Topmanagers $model */

$this->title = 'Create Topmanagers';
$this->params['breadcrumbs'][] = ['label' => 'Topmanagers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topmanagers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
