<?php

use common\models\Topmanagers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\TopmanagersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Topmanagers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topmanagers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Topmanagers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'company_id',
                    'full_name',
                    'position',
                    'bio:ntext',

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
                            'urlCreator' => function ($action, Topmanagers $model) {
                                return Url::to([$action, 'id' => $model->id]);
                            },
                    ],
            ],
    ]); ?>



</div>
