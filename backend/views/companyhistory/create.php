<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CompanyHistory $model */

$this->title = 'Create Company History';
$this->params['breadcrumbs'][] = ['label' => 'Company Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
