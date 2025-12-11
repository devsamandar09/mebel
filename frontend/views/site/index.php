<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */


use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'mebel';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=\frontend\widgets\About::widget()?>
<?=\frontend\widgets\Team::widget()?>

<?=\frontend\widgets\Process::widget()?>
<?=\frontend\widgets\Products::widget()?>
<?=\frontend\widgets\Recentwork::widget()?>
<?=\frontend\widgets\Journey::widget()?>
<?=\frontend\widgets\Blog::widget()?>
<?=\frontend\widgets\Footer::widget()?>
