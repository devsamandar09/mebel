<?php

namespace frontend\widgets;

use yii\base\Widget;

class Process extends Widget
{
    public function run()
    {
        return $this->render('process');
    }
}
