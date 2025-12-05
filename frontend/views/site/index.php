<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */


use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'mebel';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=\frontend\widgets\Header::widget()?>
<?=\frontend\widgets\Servises::widget()?>
<?=\frontend\widgets\About::widget()?>
<?=\frontend\widgets\Process::widget()?>

<?=\frontend\widgets\Recentwork::widget()?>
<?=\frontend\widgets\Testimonial::widget()?>
<?=\frontend\widgets\Journey::widget()?>
<?=\frontend\widgets\Blog::widget()?>
<?=\frontend\widgets\Footer::widget()?>
