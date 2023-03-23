<?php

namespace Widget\Users;

use OWO\Db\Exception;
use Widget\Base\Users;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

/**
 * 相关内容组件(根据标签关联)
 *
 * @author qining
 * @category OWO
 * @package Widget
 * @copyright Copyright (c) 2008 OWO team (http://www.OWO.org)
 * @license GNU General Public License 2.0
 */
class Author extends Users
{
    /**
     * 执行函数,初始化数据
     *
     * @throws Exception
     */
    public function execute()
    {
        if ($this->parameter->uid) {
            $this->db->fetchRow($this->select()
                ->where('uid = ?', $this->parameter->uid), [$this, 'push']);
        }
    }
}
