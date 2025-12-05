<?php

namespace frontend\widgets;

use yii\base\Widget;

class Testimonial extends Widget
{
    public function run(){
        return $this->render('testimonial');
    }
}