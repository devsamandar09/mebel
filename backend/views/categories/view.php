<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Categories $model */

$this->title = 'Kategoriya #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategoriyalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="categories-view" style="margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i><?= Html::encode($this->title) ?>
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
                            'category_id',
                            [
                                'attribute' => 'title_uz',
                                'label' => 'Sarlavha (UZ)',
                            ],
                            [
                                'attribute' => 'title_ru',
                                'label' => 'Sarlavha (RU)',
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
                                'attribute' => 'image',
                                'label' => 'Rasm',
                                'format' => 'html',
                                'value' => function($model) {
                                    return $model->image
                                        ? Html::img($model->image, ['style' => 'max-width: 500px; max-height: 400px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'])
                                        : '<span class="text-muted">Rasm yuklanmagan</span>';
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
    .categories-view .card {
        border-radius: 10px;
        border: none;
    }

    .categories-view .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px 10px 0 0 !important;
        padding: 15px 20px;
    }

    .categories-view .card-header .btn {
        margin-left: 5px;
    }

    .categories-view .card-body {
        padding: 25px;
    }

    .categories-view .detail-view th {
        width: 200px;
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .categories-view .detail-view td {
        background-color: #ffffff;
    }

    .categories-view .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075),
        0 0.25rem 1rem rgba(0, 0, 0, 0.1) !important;
    }
</style>
