<?php

namespace frontend\widgets;

use common\models\Menu;
use yii\base\Widget;

class HeaderWidget extends Widget
{
    public function run()
    {
        $menu_top = Menu::find()->where('status = 1 AND top = 1 AND url !="/"')->orderBy('sort_top')->all();
        $menu_middle = Menu::find()->where('status = 1 AND middle = 1')->orderBy('sort_middle')->all();

        return $this->render('header', compact('menu_top', 'menu_middle'));
    }
}