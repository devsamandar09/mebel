<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\CompanyCard $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-card-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'contacts',
            'address',
            'email:email',
            'instagram_link',
            'facebook_link',
            'linkedin_link',
            'youtube_link',
            'Why_us_uz',
            'Why_us_ru',
            'regular_customers',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
