<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Topmanagers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="topmanagers-form" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?= Html::encode($this->title) ?></h5>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'company_id')->textInput() ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'bio')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
