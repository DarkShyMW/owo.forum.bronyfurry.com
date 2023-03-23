<?php

namespace Widget\Comments;

use OWO\Config;
use OWO\Db;
use OWO\Db\Exception;
use Widget\Base\Comments;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

/**
 * 最近评论组件
 *
 * @category OWO
 * @package Widget
 * @copyright Copyright (c) 2008 OWO team (http://www.OWO.org)
 * @license GNU General Public License 2.0
 */
class Recent extends Comments
{
    /**
     * @param Config $parameter
     */
    protected function initParameter(Config $parameter)
    {
        $parameter->setDefault(
            ['pageSize' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false]
        );
    }

    /**
     * 执行函数
     *
     * @throws Exception
     */
    public function execute()
    {
        $select = $this->select()->limit($this->parameter->pageSize)
            ->where('table.comments.status = ?', 'approved')
            ->order('table.comments.coid', Db::SORT_DESC);

        if ($this->parameter->parentId) {
            $select->where('cid = ?', $this->parameter->parentId);
        }

        if ($this->options->commentsShowCommentOnly) {
            $select->where('type = ?', 'comment');
        }

        /** 忽略作者评论 */
        if ($this->parameter->ignoreAuthor) {
            $select->where('ownerId <> authorId');
        }

        $this->db->fetchAll($select, [$this, 'push']);
    }
}
