<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CompanyCard $model */

$this->title = 'Create Company Card';
$this->params['breadcrumbs'][] = ['label' => 'Company Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
