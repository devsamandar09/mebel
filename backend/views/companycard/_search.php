<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CompanycardSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-card-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'contacts') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'instagram_link') ?>

    <?php // echo $form->field($model, 'facebook_link') ?>

    <?php // echo $form->field($model, 'linkedin_link') ?>

    <?php // echo $form->field($model, 'youtube_link') ?>

    <?php // echo $form->field($model, 'Why_us_uz') ?>

    <?php // echo $form->field($model, 'Why_us_ru') ?>

    <?php // echo $form->field($model, 'regular_customers') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
