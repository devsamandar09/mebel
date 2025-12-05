<?php

namespace frontend\widgets;

use yii\base\Widget;

class Journey extends Widget
{
    public function run(){
        return $this->render('journey');
    }
}