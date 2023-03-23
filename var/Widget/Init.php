<?php

namespace Widget;

use OWO\Common;
use OWO\Cookie;
use OWO\Date;
use OWO\Db;
use OWO\I18n;
use OWO\Plugin;
use OWO\Response;
use OWO\Router;
use OWO\Widget;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

/**
 * 初始化模块
 *
 * @package Widget
 */
class Init extends Widget
{
    /**
     * 入口函数,初始化路由器
     *
     * @access public
     * @return void
     * @throws Db\Exception
     */
    public function execute()
    {
        /** 初始化exception */
        if (!defined('__OWO_DEBUG__') || !__OWO_DEBUG__) {
            set_exception_handler(function (\Throwable $exception) {
                Response::getInstance()->clean();
                ob_end_clean();

                ob_start(function ($content) {
                    Response::getInstance()->sendHeaders();
                    return $content;
                });

                if (404 == $exception->getCode()) {
                    ExceptionHandle::alloc();
                } else {
                    Common::error($exception);
                }

                exit;
            });
        }

        // init class
        define('__OWO_CLASS_ALIASES__', [
            'OWO_Plugin_Interface'    => '\OWO\Plugin\PluginInterface',
            'OWO_Widget_Helper_Empty' => '\OWO\Widget\Helper\EmptyClass',
            'OWO_Db_Adapter_Mysql'    => '\OWO\Db\Adapter\Mysqli',
            'Widget_Abstract'             => '\Widget\Base',
            'Widget_Abstract_Contents'    => '\Widget\Base\Contents',
            'Widget_Abstract_Comments'    => '\Widget\Base\Comments',
            'Widget_Abstract_Metas'       => '\Widget\Base\Metas',
            'Widget_Abstract_Options'     => '\Widget\Base\Options',
            'Widget_Abstract_Users'       => '\Widget\Base\Users',
            'Widget_Metas_Category_List'  => '\Widget\Metas\Category\Rows',
            'Widget_Contents_Page_List'   => '\Widget\Contents\Page\Rows',
            'Widget_Plugins_List'         => '\Widget\Plugins\Rows',
            'Widget_Themes_List'          => '\Widget\Themes\Rows',
            'Widget_Interface_Do'         => '\Widget\ActionInterface',
            'Widget_Do'                   => '\Widget\Action',
            'AutoP'                       => '\Utils\AutoP',
            'PasswordHash'                => '\Utils\PasswordHash',
            'Markdown'                    => '\Utils\Markdown',
            'HyperDown'                   => '\Utils\HyperDown',
            'Helper'                      => '\Utils\Helper',
            'Upgrade'                     => '\Utils\Upgrade'
        ]);

        /** 对变量赋值 */
        $options = Options::alloc();

        /** 语言包初始化 */
        if ($options->lang && $options->lang != 'zh_CN') {
            $dir = defined('__OWO_LANG_DIR__') ? __OWO_LANG_DIR__ : __OWO_ROOT_DIR__ . '/usr/langs';
            I18n::setLang($dir . '/' . $options->lang . '.mo');
        }

        /** 备份文件目录初始化 */
        if (!defined('__OWO_BACKUP_DIR__')) {
            define('__OWO_BACKUP_DIR__', __OWO_ROOT_DIR__ . '/usr/backups');
        }

        /** cookie初始化 */
        Cookie::setPrefix($options->rootUrl);
        if (defined('__OWO_COOKIE_OPTIONS__')) {
            Cookie::setOptions(__OWO_COOKIE_OPTIONS__);
        }

        /** 初始化路由器 */
        Router::setRoutes($options->routingTable);

        /** 初始化插件 */
        Plugin::init($options->plugins);

        /** 初始化回执 */
        $this->response->setCharset($options->charset);
        $this->response->setContentType($options->contentType);

        /** 初始化时区 */
        Date::setTimezoneOffset($options->timezone);

        /** 开始会话, 减小负载只针对后台打开session支持 */
        if ($options->installed && User::alloc()->hasLogin()) {
            @session_start();
        }
    }
}
