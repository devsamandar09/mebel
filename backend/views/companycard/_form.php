<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CompanyCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-card-form" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?= Html::encode($this->title) ?></h5>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'instagram_link')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'facebook_link')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'linkedin_link')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'youtube_link')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'Why_us_uz')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'Why_us_ru')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'regular_customers')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
