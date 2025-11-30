<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AboutCompany $model */

$this->title = 'Create About Company';
$this->params['breadcrumbs'][] = ['label' => 'About Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
