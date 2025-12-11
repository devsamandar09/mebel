<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\AboutCompany;

/** @var yii\web\View $this */
/** @var common\models\TopManagers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="top-managers-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'company_id')->dropDownList(
                ArrayHelper::map(AboutCompany::find()->all(), 'id', 'title_uz'),
                ['prompt' => 'Kompaniyani tanlang']
            ) ?>
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

    <div class="row">
        <div class="col-lg-12">
            <label class="form-label"><b>Rasm yuklash</b></label>
            <div class="upload-box" onclick="document.getElementById('manager-image-input').click()">
                <input type="file" id="manager-image-input" name="TopManagers[imageFile]" accept="image/*" style="display: none;" onchange="previewManagerImage(this)">
                <div id="manager-image-preview" class="preview-container">
                    <?php if ($model->image): ?>
                        <img src="<?= $model->image ?>" alt="Preview">
                    <?php else: ?>
                        <div class="upload-placeholder">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: #ccc;"></i>
                            <p>Rasmni yuklash uchun bosing</p>
                            <span class="text-muted">PNG, JPG, JPEG, GIF (max 2MB)</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .upload-box {
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fafafa;
        margin-bottom: 15px;
    }
    .upload-box:hover {
        border-color: #5cb85c;
        background-color: #f0fff0;
    }
    .upload-placeholder {
        color: #999;
    }
    .upload-placeholder p {
        margin: 10px 0 5px;
        font-weight: 500;
    }
    .preview-container {
        width: 100%;
    }
    .preview-container img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 4px;
    }
</style>

<script>
    function previewManagerImage(input) {
        const preview = document.getElementById('manager-image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>