<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.png" />
</head>
<?$module = $sf_context->getModuleName()?>
<?$uri = $sf_context->getRequest()->getUri()?>
<?$page = $sf_context->GetRequest()->getParameter('page')?>
<body>
<div id="page-wrapper">
  <div id="page-header">
    <a href="/"><img id="page-logo" src="/images/sleipnir-right.png"/>
    <h1>android.hlidskialf.com</h1></a>
  </div>
  <div id="page-links" class="nav-links">
    <div class="<?=$page=='software'||strpos($uri,'/software') !== FALSE ? "active" : ""?>"><a href="/software">Software</a></div>
    <div class="<?=$module == "post"||$module=="tag" ? "active" : ""?>"><a href="/post">Blog</a></div>
    <div class="<?=strpos($uri,'/about') !== FALSE ? "active" : ""?>"><a href="/about">About</a></div>
    <div class="<?=strpos($uri,'/contact') !== FALSE ? "active" : ""?>"><a href="/contact">Contact</a></div>
  </div>

  <div id="page-left-sidebar">
    <a href="/software/alarming">Alarming!</a><br/>
  </div>

  <div id="page-content">
    <?= $sf_content ?>
  </div>

  <div class="page-footer-push"></div>
</div>

<div id="page-footer">
  <a href="/">Home</a> | <a href="/software">Software</a> | <a href="/post">Blog</a> | <a href="/about">About</a> | <a href="/contact">Contact</a><br/>
  <br/>
  <b>Software:</b> <a href="/software/alarming">Alarming!</a><br/>

  <div style="text-align: right">
  Site by M. Wiggins &lt;<a href="/contact"><img src="/images/code_email.png" style="border: none;height: 12px"/></a>&gt; 
  </div>
</div>

</body>
</html>
