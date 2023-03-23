<?php if(!defined('__OWO_ADMIN__')) exit; ?>
<script src="<?php $options->adminStaticUrl('js', 'purify.js'); ?>"></script>
<script>
(function () {
    $(document).ready(function () {
        $('.OWO-list-table').tableSelectable({
            checkEl     :   'input[type=checkbox]',
            rowEl       :   'tr',
            selectAllEl :   '.OWO-table-select-all',
            actionEl    :   '.dropdown-menu a,button.btn-operate'
        });

        $('.btn-drop').dropdownMenu({
            btnEl       :   '.dropdown-toggle',
            menuEl      :   '.dropdown-menu'
        });
    });
})();
</script>
