
<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductItems $model */

$this->title = 'Yangi Mahsulot Elementi';
$this->params['breadcrumbs'][] = ['label' => 'Mahsulot Elementlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>