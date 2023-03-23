<?php

namespace OWO\Db\Adapter;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

use OWO\Db\Exception as DbException;

/**
 * 数据库连接异常类
 *
 * @package Db
 */
class SQLException extends DbException
{
}
