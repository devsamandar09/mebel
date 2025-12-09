<?php

use common\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'category_id',
                    'title_uz',
                    'title_ru',
                    'description_uz',

                    [
                            'class' => 'yii\grid\ActionColumn',
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
                                                        'confirm' => 'Are you sure you want to delete?',
                                                        'method' => 'post',
                                                ],
                                        ]);
                                    },
                            ],
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'urlCreator' => function ($action, Categories $model) {
                                return Url::to([$action, 'id' => $model->id]);
                            },
                    ],
            ],
    ]); ?>


</div>
