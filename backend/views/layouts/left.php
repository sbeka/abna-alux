<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Верхнее меню', 'icon' => 'fa fa-user', 'url' => ['/menu/top']],
                    ['label' => 'Среднее меню', 'icon' => 'fa fa-user', 'url' => ['/menu/middle']],
                    ['label' => 'Нижнее меню', 'icon' => 'fa fa-user', 'url' => ['/menu/footer']],
                    ['label' => 'Слайдер', 'icon' => 'fa fa-user', 'url' => ['/slider']],
                    ['label' => 'Тренинги и семинары', 'icon' => 'fa fa-user', 'url' => ['/seminars']],
                    ['label' => 'Форумы', 'icon' => 'fa fa-user', 'url' => ['/forums']],
                    ['label' => 'Новости', 'icon' => 'fa fa-user', 'url' => ['/news']],
                    ['label' => 'Спикеры и менторы', 'icon' => 'fa fa-user', 'url' => ['/speakers']],
//                    [
//                        'label' => 'Меню',
//                        'icon' => 'fa fa-home',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Верхнее меню', 'icon' => 'fa fa-file-zip-o', 'url' => ['/menu/top']],
//                            ['label' => 'Нижнее меню', 'icon' => 'fa fa-file-zip-o', 'url' => ['/menu/footer']],
//                        ],
//                    ],
                ],
            ]
        ) ?>
    </section>

</aside>