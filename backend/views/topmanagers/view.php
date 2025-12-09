<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Topmanagers $model */

$this->title = 'Rahbar #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rahbarlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="topmanagers-view" style="margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-tie me-2"></i><?= Html::encode($this->title) ?>
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
                            'company_id',
                            [
                                'attribute' => 'full_name',
                                'label' => 'To\'liq ismi',
                            ],
                            [
                                'attribute' => 'position',
                                'label' => 'Lavozimi',
                            ],
                            [
                                'attribute' => 'bio',
                                'label' => 'Biografiya',
                                'format' => 'ntext',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .topmanagers-view .card {
        border-radius: 10px;
        border: none;
    }

    .topmanagers-view .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px 10px 0 0 !important;
        padding: 15px 20px;
    }

    .topmanagers-view .card-header .btn {
        margin-left: 5px;
    }

    .topmanagers-view .card-body {
        padding: 25px;
    }

    .topmanagers-view .detail-view th {
        width: 200px;
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .topmanagers-view .detail-view td {
        background-color: #ffffff;
    }

    .topmanagers-view .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075),
        0 0.25rem 1rem rgba(0, 0, 0, 0.1) !important;
    }
</style>
