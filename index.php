<?php
/**
 * OWO Blog Platform
 *
 * @copyright  Copyright (c) 2008 OWO team (http://www.OWO.org)
 * @license    GNU General Public License 2.0
 * @version    $Id: index.php 1153 2009-07-02 10:53:22Z magike.net $
 */

/** Поддержка конфигурации загрузки */
if (!defined('__OWO_ROOT_DIR__') && !@include_once 'config.inc.php') {
    file_exists('./install.php') ? header('Location: install.php') : print('Missing Config File');
    exit;
}

/** Инициализация компонента */
\Widget\Init::alloc();

/** Регистрация плагина инициализации */
\OWO\Plugin::factory('index.php')->begin();

/** Распределение маршрутов */
\OWO\Router::dispatch();

/** Зарегистрируем конечный подключаемый модуль */
\OWO\Plugin::factory('index.php')->end();
