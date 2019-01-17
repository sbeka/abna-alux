-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 09 2018 г., 20:32
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `domhouse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `checkbox_category`
--

CREATE TABLE `checkbox_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `margings_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `for_menu`
--

CREATE TABLE `for_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `for_menu`
--

INSERT INTO `for_menu` (`id`, `menu_id`, `text`) VALUES
(86, 1, '1'),
(87, 1, '3'),
(88, 1, '555');

-- --------------------------------------------------------

--
-- Структура таблицы `margins`
--

CREATE TABLE `margins` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `margins`
--

INSERT INTO `margins` (`id`, `name`) VALUES
(1, 'Селект'),
(2, 'Чекбокс'),
(3, 'Текстовое поле'),
(4, 'Поле стринг');

-- --------------------------------------------------------

--
-- Структура таблицы `margins_all`
--

CREATE TABLE `margins_all` (
  `id` int(11) NOT NULL,
  `margings_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `margins_category`
--

CREATE TABLE `margins_category` (
  `id` int(11) NOT NULL,
  `margins_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_cell` varchar(30) NOT NULL,
  `value_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `margins_category`
--

INSERT INTO `margins_category` (`id`, `margins_id`, `category_id`, `name`, `name_cell`, `value_text`) VALUES
(10, 1, 1, 'Цвет машины', 'cv_car', '1;2;3'),
(11, 2, 1, 'asf', 'asf', '1;2;3'),
(12, 2, 1, 'eee', 'eee', 'ee;rr;rr'),
(13, 3, 1, 'ggg', 'ggg', ''),
(14, 4, 1, 'Цвет машины', 'gggss', ''),
(15, 1, 1, 'Цвет машины1', 'dfdf', 'ddd');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cv_car` varchar(50) DEFAULT NULL,
  `asf` text,
  `eee` text,
  `ggg` varchar(255) DEFAULT NULL,
  `gggss` varchar(255) DEFAULT NULL,
  `dfdf` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `description`, `keywords`, `name`, `text`, `url`, `sort`, `status`, `cv_car`, `asf`, `eee`, `ggg`, `gggss`, `dfdf`) VALUES
(1, 'Главная', 'Описание', 'Ключевые слова', 'Главная', '<p>Данная технология впервые разработана в Японии.Конструкция куполообразного дома в результате 8-летних исследований признана наиболее эффективно. Не случайно в военной и космических промышленностях используется именно сферические и круглые формы. Дома по данной технологии были разработаны японскими инженерами более 30 лет назад. Отличительной особенностью этой технологии является высокая сейсмобезопасность, сравнительно низкая себестоимость и уменьшенные затраты на обогрев здания. Дом представляет собой конструкцию состоящую из элементов, сделанных из негорючего пенополистирола повышенной плотности (35 кг/м3). Из пенополистирола изготавливается и монтируется купольное здание . Форма монтируемого здания может быть круглой, либо вытянутой по длине (арочного типа). Радиус закруглений здания может быть переменным от 2,5 до 5 метров. Толщина стен &mdash; 180 мм. Снаружи и изнутри стены здания покрываются армированной штукатуркой на основе цементно-полимерных вяжущих материалов. Усиливается штукатурка двухслойной армировочной сеткой из стекловолокна. Толщина штукатурки 10 &mdash; 16 мм. Конструктивная прочность здания обеспечивается за счет распределенной нагрузки по сферической поверхности. В случае проектирования второго этажа (при домах радиусом 4-5 м) монтируется несущий каркас из металла, дерева или железобетона. Отличительной особенностью домов является возможность легкого проектирования и применения любых форм, от одной до нескольких конструкций, а также присоединять дополнительные пристройки в будущем.В целом здание может компоноваться из 2-5 куполов различного радиуса и формы по желанию заказчика. Соединяются купола между собой коридорами или сочленениями с небольшим наложением друг на друга. Это позволяет вести поэтапное строительство с полным завершением отдельных этапов. Тем временем, это вполне осязаемое и реальное настоящее. Непривычное, но привлекательное, подкупающее с первого взгляда оригинальностью, уютом, лаконичным дизайном и, что важно, доступностью. Купольные конструкции из пенополистирола уже завоевали популярность в Японии, Корее и Европе. Дома, изготовленные по данной технологии активно строятся в Канаде, Австрии, США, Японии, Иране, Ираке, Бахрейне, Катаре, ОАЭ, Монголии.</p>\r\n', '/', 1, 1, '2', '1;2;3', 'ee', '11555', '22', 'ddd'),
(4, 'Энергосберигающие дома', '<p>Энергосберигающие дома</p>', '<p>Энергосберигающие дома</p>', '', '', 'energy-saving-houses', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Купольные кафе', '<p>Быстровозводимые кафе в цифрах</p>', '<p>Быстровозводимые кафе в цифрах</p>', '', '', 'dome-cafes', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Экономные теплицы', '<p>Экономные теплицы</p>', '<p>Экономные теплицы</p>', '', '', 'economical-greenhouses', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Гостевые дома', '<p>Гостевые дома в цифрах</p>', '<p>Гостевые дома в цифрах</p>', '', '', 'guest-houses', 5, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Мини-гостиницы', '<p>Мини-гостиницы в цифрах</p>', '<p>Мини-гостиницы в цифрах</p>', '', '', 'mini-hotels', 6, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Сборные юрты', '<p>Сборные юрты</p>', '<p>Сборные юрты</p>', '', '', 'prefabricated-yurts', 7, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Галерея', '', '', '', '', 'gallery', 8, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Наши проекты', '', '', '', '', 'our-projects\r\n', 9, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1532062634),
('m130524_201442_init', 1532062639);

-- --------------------------------------------------------

--
-- Структура таблицы `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `text` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `models`
--

INSERT INTO `models` (`id`, `name`, `text`) VALUES
(1, 'Menu', 'Меню'),
(2, 'NewClass', 'Новый класс');

-- --------------------------------------------------------

--
-- Структура таблицы `new_class`
--

CREATE TABLE `new_class` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `text` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `cv_car` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `new_class`
--

INSERT INTO `new_class` (`id`, `status`, `text`, `title`, `url`, `category_id`, `name`, `img`, `sort`, `cv_car`) VALUES
(7, 1, 'asf', '', 'asfsaf', 1, 'fff', '1536433042YW0DIgHPsvw.jpg', 2, NULL),
(8, 1, '<p>Текст</p>\r\n', '<p>Заголовок</p>', 'asf', 1, 'asf', '1536481505images.jpg', 1, NULL),
(9, 0, 'sadfg', '', 'asf', 4, '1', '1536467517a7915fa84dd046b1749406f20a3efc1b.jpg', 5, NULL),
(10, 0, 'asf', 'asf', 'asf', 4, 'asf', '1536467517YW0DIgHPsvw.jpg', 6, NULL),
(11, 0, 'asf', 'asf', 'asf', 4, 'asf', '1536467517images.jpg', 3, NULL),
(12, 1, '0', '7', '0', 8, '0', '1536471962a7915fa84dd046b1749406f20a3efc1b.jpg', 4, NULL),
(14, 3, '0', '9', '0', 8, '0', '1536471962images.jpg', 7, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `text`, `sort`) VALUES
(2, 'фыаыфа', '<p>3532532</p>\r\n', 1),
(3, 'safsaf', '<p>577547</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title1` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `title3` varchar(255) NOT NULL,
  `title4` varchar(255) NOT NULL,
  `title5` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title1`, `title2`, `title3`, `title4`, `title5`, `image`, `category_id`, `sort`) VALUES
(28, '0', '0', '0', '0', '0', '1536482097YW0DIgHPsvw.jpg', 1, 1),
(30, '0', '0', '0', '0', '0', '1536483749a7915fa84dd046b1749406f20a3efc1b.jpg', 4, 2),
(31, '0', '0', '0', '0', '0', '1536483749YW0DIgHPsvw.jpg', 4, 3),
(32, '0', '0', '0', '0', '0', '1536483749images.jpg', 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Jda-l5Tlc6w3_HUYQd0S__xgquoqkZ9v', '$2y$13$.o3hS8GPDCTpJBFaRflxUO4R6oEOvv5Cny3TL3CQYED5CuXOJR7sS', NULL, 'it_yvm@mail.ru', 10, 1533018523, 1533018523);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `checkbox_category`
--
ALTER TABLE `checkbox_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `for_menu`
--
ALTER TABLE `for_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Индексы таблицы `margins`
--
ALTER TABLE `margins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `margins_all`
--
ALTER TABLE `margins_all`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `margins_category`
--
ALTER TABLE `margins_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `new_class`
--
ALTER TABLE `new_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `checkbox_category`
--
ALTER TABLE `checkbox_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `for_menu`
--
ALTER TABLE `for_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT для таблицы `margins`
--
ALTER TABLE `margins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `margins_all`
--
ALTER TABLE `margins_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `margins_category`
--
ALTER TABLE `margins_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `new_class`
--
ALTER TABLE `new_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `for_menu`
--
ALTER TABLE `for_menu`
  ADD CONSTRAINT `for_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `new_class`
--
ALTER TABLE `new_class`
  ADD CONSTRAINT `new_class_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
