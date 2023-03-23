<?php

namespace Widget\Themes;

use OWO\Common;
use OWO\Plugin;
use OWO\Widget;
use Widget\Options;

if (!defined('__OWO_ROOT_DIR__')) {
    exit;
}

/**
 * 风格列表组件
 *
 * @author qining
 * @category OWO
 * @package Widget
 * @copyright Copyright (c) 2008 OWO team (http://www.OWO.org)
 * @license GNU General Public License 2.0
 */
class Rows extends Widget
{
    /**
     * 执行函数
     */
    public function execute()
    {
        $themes = $this->getThemes();

        if ($themes) {
            $options = Options::alloc();
            $activated = 0;
            $result = [];

            foreach ($themes as $key => $theme) {
                $themeFile = $theme . '/index.php';
                if (file_exists($themeFile)) {
                    $info = Plugin::parseInfo($themeFile);
                    $info['name'] = $this->getTheme($theme, $key);

                    if ($info['activated'] = ($options->theme == $info['name'])) {
                        $activated = $key;
                    }

                    $screen = array_filter(glob($theme . '/*'), function ($path) {
                        return preg_match("/screenshot\.(jpg|png|gif|bmp|jpeg|webp|avif)$/i", $path);
                    });

                    if ($screen) {
                        $info['screen'] = $options->themeUrl(basename(current($screen)), $info['name']);
                    } else {
                        $info['screen'] = Common::url('noscreen.png', $options->adminStaticUrl('img'));
                    }

                    $result[$key] = $info;
                }
            }

            $clone = $result[$activated];
            unset($result[$activated]);
            array_unshift($result, $clone);
            array_filter($result, [$this, 'push']);
        }
    }

    /**
     * @return array
     */
    protected function getThemes(): array
    {
        return glob(__OWO_ROOT_DIR__ . __OWO_THEME_DIR__ . '/*', GLOB_ONLYDIR);
    }

    /**
     * get theme
     *
     * @param string $theme
     * @param mixed $index
     * @return string
     */
    protected function getTheme(string $theme, $index): string
    {
        return basename($theme);
    }
}
