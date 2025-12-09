<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AboutCompany $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="about-company-form" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> <?= Html::encode($this->title) ?></h5>
        </div>
        <div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
                </div>


                <div class="col-lg-6">
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
    <?= $form->field($model, 'description_uz')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-lg-6">
    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>
                </div>
            </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
