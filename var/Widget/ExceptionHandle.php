<?php

namespace Widget;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

/**
 * 异常处理组件
 *
 * @author qining
 * @category OWO
 * @package Widget
 * @copyright Copyright (c) 2008 OWO team (http://www.OWO.org)
 * @license GNU General Public License 2.0
 */
class ExceptionHandle extends Base
{
    /**
     * 重载构造函数
     */
    public function execute()
    {
        Archive::allocWithAlias('404', 'type=404')->render();
    }
}
