<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AboutCompany $model */

$this->title = 'Update About Company: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'About Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="about-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
