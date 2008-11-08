<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<? use_stylesheet('main') ?>
<? use_stylesheet('backend') ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

<?if($sf_user->isAuthenticated()):?>
  <div id="auth-notice">Logged in as <?=$sf_user->getUser()?></div>
  <div class="navbar">
    <div class="navlink"><?=link_to('Posts','post/list')?></div>
    <div class="navlink"><?=link_to('Tags','tag/list')?></div>
    <?if($sf_user->hasCredential('BackAdmin')):?>
    <div class="navlink"><?=link_to('Users','users/list')?></div>
    <?endif?>
  </div>
  <div class="float-clear"></div>
<?endif?>

  <div id="sf_content"> <?= $sf_content ?> </div>

</body>
</html>
