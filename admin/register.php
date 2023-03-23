<?php
include 'common.php';

if ($user->hasLogin() || !$options->allowRegister) {
    $response->redirect($options->siteUrl);
}
$rememberName = htmlspecialchars(\OWO\Cookie::get('__OWO_remember_name'));
$rememberMail = htmlspecialchars(\OWO\Cookie::get('__OWO_remember_mail'));
\OWO\Cookie::delete('__OWO_remember_name');
\OWO\Cookie::delete('__OWO_remember_mail');

$bodyClass = 'body-100';

include 'header.php';
?>
<div class="OWO-login-wrap">
    <div class="OWO-login">
        <h1><a href="http://OWO.org" class="i-logo">OWO</a></h1>
        <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form">
            <p>
                <label for="name" class="sr-only"><?php _e('用户名'); ?></label>
                <input type="text" id="name" name="name" placeholder="<?php _e('用户名'); ?>" value="<?php echo $rememberName; ?>" class="text-l w-100" autofocus />
            </p>
            <p>
                <label for="mail" class="sr-only"><?php _e('Email'); ?></label>
                <input type="email" id="mail" name="mail" placeholder="<?php _e('Email'); ?>" value="<?php echo $rememberMail; ?>" class="text-l w-100" />
            </p>
            <p class="submit">
                <button type="submit" class="btn btn-l w-100 primary"><?php _e('注册'); ?></button>
            </p>
        </form>
        
        <p class="more-link">
            <a href="<?php $options->siteUrl(); ?>"><?php _e('返回首页'); ?></a>
            &bull;
            <a href="<?php $options->adminUrl('login.php'); ?>"><?php _e('用户登录'); ?></a>
        </p>
    </div>
</div>
<?php 
include 'common-js.php';
?>
<script>
$(document).ready(function () {
    $('#name').focus();
});
</script>
<?php
include 'footer.php';
?>
