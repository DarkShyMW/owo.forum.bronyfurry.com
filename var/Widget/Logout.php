<?php

namespace Widget;

use Widget\Base\Users;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

/**
 * 登出组件
 *
 * @category OWO
 * @package Widget
 * @copyright Copyright (c) 2008 OWO team (http://www.OWO.org)
 * @license GNU General Public License 2.0
 */
class Logout extends Users implements ActionInterface
{
    /**
     * 初始化函数
     *
     * @access public
     * @return void
     */
    public function action()
    {
        // protect
        $this->security->protect();

        $this->user->logout();
        self::pluginHandle()->logout();
        @session_destroy();
        $this->response->goBack(null, $this->options->index);
    }
}
