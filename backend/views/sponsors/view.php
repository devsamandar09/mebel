<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Sponsors $model */

$this->title = 'Homiy #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Homiylar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="sponsors-view" style="margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-handshake me-2"></i><?= Html::encode($this->title) ?>
                    </h5>
                    <div class="btn-group">
                        <?= Html::a('<i class="fas fa-edit"></i> Tahrirlash', ['update', 'id' => $model->id], [
                            'class' => 'btn btn-primary btn-sm'
                        ]) ?>
                        <?= Html::a('<i class="fas fa-trash"></i> O\'chirish', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Haqiqatan ham bu elementni o\'chirmoqchimisiz?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('<i class="fas fa-arrow-left"></i> Orqaga', ['index'], [
                            'class' => 'btn btn-secondary btn-sm'
                        ]) ?>
                    </div>
                </div>
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table table-striped table-bordered detail-view'],
                        'attributes' => [
                            'id',
                            [
                                'attribute' => 'name_uz',
                                'label' => 'Nomi (UZ)',
                            ],
                            [
                                'attribute' => 'name_ru',
                                'label' => 'Nomi (RU)',
                            ],
                            [
                                'attribute' => 'description_uz',
                                'label' => 'Tavsif (UZ)',
                            ],
                            [
                                'attribute' => 'description_ru',
                                'label' => 'Tavsif (RU)',
                            ],
                            [
                                'attribute' => 'logo',
                                'label' => 'Logo',
                                'format' => 'html',
                                'value' => function($model) {
                                    return $model->logo
                                        ? Html::img($model->logo, ['style' => 'max-width: 500px; max-height: 400px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'])
                                        : '<span class="text-muted">Logo yuklanmagan</span>';
                                },
                            ],
                            [
                                'attribute' => 'created_at',
                                'label' => 'Yaratilgan vaqt',
                                'value' => function($model) {
                                    return $model->created_at
                                        ? Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i:s')
                                        : '-';
                                },
                            ],
                            [
                                'attribute' => 'updated_at',
                                'label' => 'Yangilangan vaqt',
                                'value' => function($model) {
                                    return $model->updated_at
                                        ? Yii::$app->formatter->asDatetime($model->updated_at, 'php:d.m.Y H:i:s')
                                        : '-';
                                },
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .sponsors-view .card {
        border-radius: 10px;
        border: none;
    }

    .sponsors-view .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px 10px 0 0 !important;
        padding: 15px 20px;
    }

    .sponsors-view .card-header .btn {
        margin-left: 5px;
    }

    .sponsors-view .card-body {
        padding: 25px;
    }

    .sponsors-view .detail-view th {
        width: 200px;
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .sponsors-view .detail-view td {
        background-color: #ffffff;
    }

    .sponsors-view .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075),
        0 0.25rem 1rem rgba(0, 0, 0, 0.1) !important;
    }
</style>
