<?php
include '../Group11_PHP/common/Facebook/autoload.php';
include('./fbconfig.php');
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/Group11_PHP/common/fb-callback.php', $permissions);
?>