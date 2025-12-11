<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Products;

/** @var yii\web\View $this */
/** @var common\models\ProductItems $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-items-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'product_id')->dropDownList(
                ArrayHelper::map(Products::find()->all(), 'id', 'title_uz'),
                ['prompt' => 'Mahsulotni tanlang']
            ) ?>
        </div>
    </div>

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

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => '0.01']) ?>
        </div>
    </div>

    <!-- Rasm 1 -->
    <div class="row">
        <div class="col-lg-12">
            <label class="form-label"><b>Rasm 1 yuklash</b></label>
            <div class="upload-box" onclick="document.getElementById('image-input-1').click()">
                <input type="file" id="image-input-1" name="ProductItems[imageFile]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-1')">
                <div id="image-preview-1" class="preview-container">
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

    <!-- Rasm 2 -->
    <div class="row">
        <div class="col-lg-12">
            <label class="form-label"><b>Rasm 2 yuklash</b></label>
            <div class="upload-box" onclick="document.getElementById('image-input-2').click()">
                <input type="file" id="image-input-2" name="ProductItems[imageFile2]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-2')">
                <div id="image-preview-2" class="preview-container">
                    <?php if ($model->image2): ?>
                        <img src="<?= $model->image2 ?>" alt="Preview">
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

    <!-- Rasm 3 -->
    <div class="row">
        <div class="col-lg-12">
            <label class="form-label"><b>Rasm 3 yuklash</b></label>
            <div class="upload-box" onclick="document.getElementById('image-input-3').click()">
                <input type="file" id="image-input-3" name="ProductItems[imageFile3]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-3')">
                <div id="image-preview-3" class="preview-container">
                    <?php if ($model->image3): ?>
                        <img src="<?= $model->image3 ?>" alt="Preview">
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

    <div class="form-group mt-3">
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
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>