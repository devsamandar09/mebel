<?php

namespace frontend\widgets;

use yii\base\Widget;

class Team extends Widget
{
    public function run(){
        $managers = \common\models\TopManagers::find()->all();
        return $this->render('team' , ['managers' => $managers]);
    }
}