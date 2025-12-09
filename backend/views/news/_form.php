<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?= Html::encode($this->title) ?></h5>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
                    <label class="form-label"><b>Rasm yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('image-input').click()">
                        <input type="file" id="image-input" name="News[imageFile]" accept="image/*" style="display: none;" onchange="previewImage(this)">
                        <div id="image-preview" class="preview-container">
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

            <div class="form-group" style="margin-top: 20px;">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
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
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
