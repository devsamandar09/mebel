<?php

namespace frontend\widgets;

class Products extends \yii\base\Widget
{
    public function run()
    {
        $categories = \common\models\Categories::find()->all();
        return $this->render('products' , compact('categories'));
    }
}