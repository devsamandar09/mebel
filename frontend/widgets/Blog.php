<?php

namespace frontend\widgets;

use yii\base\Widget;

class Blog extends Widget
{
    public function run(){
        return $this->render('blog');
    }
}