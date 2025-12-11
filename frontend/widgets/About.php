<?php

namespace frontend\widgets;

use yii\base\Widget;

class About extends Widget
{
    public function run()
    {
        $abouts = \common\models\AboutCompany::find()->all();
        $histories = \common\models\CompanyHistory::find()->all();
        return $this->render('about', compact('abouts', 'histories'));
    }
}
