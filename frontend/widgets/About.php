<?php

namespace frontend\widgets;

use yii\base\Widget;

class About extends Widget
{
    public function run()
    {
        return $this->render('about');
    }
}
