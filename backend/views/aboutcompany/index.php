<?php

use common\models\AboutCompany;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AboutcompanySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'About Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create About Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-bordered table-striped'],

            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title_uz',
                    'title_ru',
                    'description_uz:ntext',
                    'description_ru:ntext',

                    [
                            'class' => ActionColumn::class,
                            'template' => '{update} {delete}',
                            'buttons' => [
                                    'update' => function ($url, $model) {
                                        return Html::a('Edit', $url, [
                                                'class' => 'btn btn-sm btn-outline-primary',
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('Delete', $url, [
                                                'class' => 'btn btn-sm btn-outline-danger',
                                                'data' => [
                                                        'confirm' => 'Are you sure you want to delete?',
                                                        'method' => 'post',
                                                ],
                                        ]);
                                    },
                            ],
                            'contentOptions' => ['style' => 'white-space:nowrap;'],
                            'urlCreator' => function ($action, $model) {
                                return Url::to([$action, 'id' => $model->id]);
                            },
                    ],

            ],
    ]); ?>



</div>
