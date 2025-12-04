<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CompanyCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagram_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'linkedin_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'youtube_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Why_us_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Why_us_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regular_customers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
