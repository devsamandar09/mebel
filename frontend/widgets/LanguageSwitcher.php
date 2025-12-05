<?php
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;

class LanguageSwitcher extends Widget
{
    public function run()
    {
        $languages = Yii::$app->params['languages'];
        $current = Yii::$app->language;
        $items = [];

        foreach ($languages as $code => $name) {
            $url = array_merge(
                [Yii::$app->controller->route],
                Yii::$app->request->get(),
                ['language' => $code]
            );
            $items[] = Html::a($name, $url, [
                'class' => $code === substr($current, 0, 2) ? 'active' : ''
            ]);
        }

        return Html::tag('div', implode(' | ', $items), ['class' => 'language-switcher']);
    }
}