<?php

use common\models\CompanyCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CompanycardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Company Cards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company Card', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'contacts',
                    'address',
                    'email:email',
                    'instagram_link',
                // 'facebook_link',
                // 'linkedin_link',
                // 'youtube_link',
                // 'Why_us_uz',
                // 'Why_us_ru',
                // 'regular_customers',
                // 'created_at',
                // 'updated_at',

                    [
                            'class' => ActionColumn::class,
                            'template' => '{update} {delete}',
                            'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('✏️', $url, [
                                                'class' => 'btn btn-sm btn-outline-primary',
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('🗑️', $url, [
                                                'class' => 'btn btn-sm btn-outline-danger',
                                                'data' => [
                                                        'confirm' => 'Rostan ham o\'chirmoqchimisiz?',
                                                        'method' => 'post',
                                                ],
                                        ]);
                                    },
                            ],
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'urlCreator' => function ($action, CompanyCard $model) {
                                return Url::to([$action, 'id' => $model->id]);
                            },
                    ],
            ],
    ]); ?>


</div>
