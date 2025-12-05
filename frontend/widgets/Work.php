<?php

namespace frontend\widgets;

use yii\base\Widget;

class Work extends Widget
{
    public function run(){
        return $this->render('work');
    }
}