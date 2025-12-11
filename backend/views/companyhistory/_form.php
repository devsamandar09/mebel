<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CompanyHistory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-history-form" style="margin-top: 50px;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?= Html::encode($this->title) ?></h5>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'company_id')->hiddenInput(
                        ['value' => \common\models\AboutCompany::find()->one()->id]
                    )->label(false
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
                <div class="col-lg-6">
                    <?= $form->field($model, 'body_uz')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'body_ru')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <hr style="margin: 30px 0;">
            <h5 class="mb-3">Rasmlar</h5>

            <div class="row">
                <!-- Image 1 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Rasm 1 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('image-input').click()">
                        <input type="file" id="image-input" name="CompanyHistory[imageFile]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview')">
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

                <!-- Image 2 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Rasm 2 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('image-input-2').click()">
                        <input type="file" id="image-input-2" name="CompanyHistory[imageFile2]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-2')">
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

            <div class="row">
                <!-- Image 3 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Rasm 3 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('image-input-3').click()">
                        <input type="file" id="image-input-3" name="CompanyHistory[imageFile3]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-3')">
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

                <!-- Image 4 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Rasm 4 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('image-input-4').click()">
                        <input type="file" id="image-input-4" name="CompanyHistory[imageFile4]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-4')">
                        <div id="image-preview-4" class="preview-container">
                            <?php if ($model->image4): ?>
                                <img src="<?= $model->image4 ?>" alt="Preview">
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

            <div class="row">
                <!-- Image 5 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Rasm 5 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('image-input-5').click()">
                        <input type="file" id="image-input-5" name="CompanyHistory[imageFile5]" accept="image/*" style="display: none;" onchange="previewImage(this, 'image-preview-5')">
                        <div id="image-preview-5" class="preview-container">
                            <?php if ($model->image5): ?>
                                <img src="<?= $model->image5 ?>" alt="Preview">
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

            <hr style="margin: 30px 0;">
            <h5 class="mb-3">Videolar</h5>

            <div class="row">
                <!-- Video 1 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Video 1 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('video-input').click()">
                        <input type="file" id="video-input" name="CompanyHistory[videoFile]" accept="video/*" style="display: none;" onchange="previewVideo(this, 'video-preview')">
                        <div id="video-preview" class="preview-container">
                            <?php if ($model->video): ?>
                                <video controls>
                                    <source src="<?= $model->video ?>">
                                </video>
                            <?php else: ?>
                                <div class="upload-placeholder">
                                    <i class="fas fa-video" style="font-size: 48px; color: #ccc;"></i>
                                    <p>Videoni yuklash uchun bosing</p>
                                    <span class="text-muted">MP4, AVI, MOV (max 50MB)</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Video 2 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('video-input-2').click()">
                        <input type="file" id="video-input-2" name="CompanyHistory[videoFile2]" accept="video/*" style="display: none;" onchange="previewVideo(this, 'video-preview-2')">
                        <div id="video-preview-2" class="preview-container">
                            <?php if ($model->video2): ?>
                                <video controls>
                                    <source src="<?= $model->video2 ?>">
                                </video>
                            <?php else: ?>
                                <div class="upload-placeholder">
                                    <i class="fas fa-video" style="font-size: 48px; color: #ccc;"></i>
                                    <p>Videoni yuklash uchun bosing</p>
                                    <span class="text-muted">MP4, AVI, MOV (max 50MB)</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Video 3 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Video 3 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('video-input-3').click()">
                        <input type="file" id="video-input-3" name="CompanyHistory[videoFile3]" accept="video/*" style="display: none;" onchange="previewVideo(this, 'video-preview-3')">
                        <div id="video-preview-3" class="preview-container">
                            <?php if ($model->video3): ?>
                                <video controls>
                                    <source src="<?= $model->video3 ?>">
                                </video>
                            <?php else: ?>
                                <div class="upload-placeholder">
                                    <i class="fas fa-video" style="font-size: 48px; color: #ccc;"></i>
                                    <p>Videoni yuklash uchun bosing</p>
                                    <span class="text-muted">MP4, AVI, MOV (max 50MB)</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Video 4 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Video 4 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('video-input-4').click()">
                        <input type="file" id="video-input-4" name="CompanyHistory[videoFile4]" accept="video/*" style="display: none;" onchange="previewVideo(this, 'video-preview-4')">
                        <div id="video-preview-4" class="preview-container">
                            <?php if ($model->video4): ?>
                                <video controls>
                                    <source src="<?= $model->video4 ?>">
                                </video>
                            <?php else: ?>
                                <div class="upload-placeholder">
                                    <i class="fas fa-video" style="font-size: 48px; color: #ccc;"></i>
                                    <p>Videoni yuklash uchun bosing</p>
                                    <span class="text-muted">MP4, AVI, MOV (max 50MB)</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Video 5 -->
                <div class="col-lg-6">
                    <label class="form-label"><b>Video 5 yuklash</b></label>
                    <div class="upload-box" onclick="document.getElementById('video-input-5').click()">
                        <input type="file" id="video-input-5" name="CompanyHistory[videoFile5]" accept="video/*" style="display: none;" onchange="previewVideo(this, 'video-preview-5')">
                        <div id="video-preview-5" class="preview-container">
                            <?php if ($model->video5): ?>
                                <video controls>
                                    <source src="<?= $model->video5 ?>">
                                </video>
                            <?php else: ?>
                                <div class="upload-placeholder">
                                    <i class="fas fa-video" style="font-size: 48px; color: #ccc;"></i>
                                    <p>Videoni yuklash uchun bosing</p>
                                    <span class="text-muted">MP4, AVI, MOV (max 50MB)</span>
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
    .preview-container img,
    .preview-container video {
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

    function previewVideo(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<video controls><source src="' + e.target.result + '"></video>';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>