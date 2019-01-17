<?php

namespace frontend\widgets;

use common\models\Menu;
use yii\base\Widget;

class FooterMenuWidget extends Widget
{
    public function run()
    {
        $menu = Menu::find()->where('status = 1 AND footer = 1')->orderBy('sort_footer')->all();

        return $this->render('footermenu', compact('menu'));
    }
}