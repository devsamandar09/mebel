<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\AboutCompany $model */

$this->title = 'Kompaniya haqida #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'About Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="about-company-view" style="margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-building me-2"></i><?= Html::encode($this->title) ?>
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
                                'format' => 'ntext',
                            ],
                            [
                                'attribute' => 'description_ru',
                                'label' => 'Tavsif (RU)',
                                'format' => 'ntext',
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
    .about-company-view .card {
        border-radius: 10px;
        border: none;
    }

    .about-company-view .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px 10px 0 0 !important;
        padding: 15px 20px;
    }

    .about-company-view .card-header .btn {
        margin-left: 5px;
    }

    .about-company-view .card-body {
        padding: 25px;
    }

    .about-company-view .detail-view th {
        width: 200px;
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .about-company-view .detail-view td {
        background-color: #ffffff;
    }

    .about-company-view .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075),
        0 0.25rem 1rem rgba(0, 0, 0, 0.1) !important;
    }
</style>