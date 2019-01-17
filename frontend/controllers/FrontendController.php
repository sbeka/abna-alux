<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 22.07.2018
 * Time: 2:02
 */

namespace frontend\controllers;

use yii\web\Controller;

class FrontendController extends  Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}