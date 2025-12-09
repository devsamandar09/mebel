<?php

use common\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
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
                // 'description_ru',
                // 'image',
                // 'created_at',
                // 'updated_at',

                    [
                            'class' => ActionColumn::class,
                            'template' => '{update} {delete}',
                            'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('✏️', $url, [
                                                'class' => 'btn btn-sm btn-outline-primary',
                                                'title' => 'Edit',
                                                'aria-label' => 'Edit',
                                                'data-pjax' => '0',
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('🗑️', $url, [
                                                'class' => 'btn btn-sm btn-outline-danger',
                                                'title' => 'Delete',
                                                'aria-label' => 'Delete',
                                                'data' => [
                                                        'confirm' => 'Are you sure you want to delete?',
                                                        'method' => 'post',
                                                ],
                                        ]);
                                    },
                            ],
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'urlCreator' => function ($action, Products $model) {
                                return Url::to([$action, 'id' => $model->id]);
                            },
                    ],
            ],
    ]); ?>



</div>
