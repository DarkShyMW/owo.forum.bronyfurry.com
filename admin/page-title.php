<?php if(!defined('__OWO_ADMIN__')) exit; ?>
<div class="OWO-page-title">
    <h2><?php echo $menu->title; ?><?php 
    if (!empty($menu->addLink)) {
        echo "<a href=\"{$menu->addLink}\">" . _t("新增") . "</a>";
    }
    ?></h2>
</div>
