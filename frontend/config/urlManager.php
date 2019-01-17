<?php

/** @var array $params */

return [
    'class' => 'yii\web\UrlManager',
//    'hostInfo' => 'http://azialife',
    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'cache' => false,
    'rules' => [
        'trainings_and_seminars'=>'menu/trainings_and_seminars',
        'trainings_and_seminars/<url:[\w-]+>' =>'menu/trainings_and_seminars',
        'speakers' =>'menu/speakers',
        '<url:[\w-]+>' => 'site/menu',

        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    ],
];