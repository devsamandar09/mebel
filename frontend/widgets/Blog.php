<?php

namespace frontend\widgets;

use yii\base\Widget;

class Blog extends Widget
{
    public function run(){
        $blogs = \common\models\News::find()->all();
        $products = \common\models\Products::find()->all();
        return $this->render('blog', compact('blogs', 'products'));
    }
}