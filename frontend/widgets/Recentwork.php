<?php

namespace frontend\widgets;

use yii\base\Widget;

class Recentwork extends Widget
{
    public function run(){
        $productions = \common\models\Production::find()->all();
        return $this->render('recentwork' , ['productions' => $productions]);
    }
}