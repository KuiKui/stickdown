<?php use_helper('Network') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' />
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Armata' />
    <?php include_stylesheets() ?>
    <?php if(!is_local($_SERVER['REMOTE_ADDR'])): ?>
    <?php echo javascript_include_tag('analytics.js'); ?>
    <?php endif; ?>
  </head>
  <body>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a id="brand" title="Stickdown.me, quickly stick your stuff." class="brand" href="/"><strong>Stick</strong>down.me</a>
        </div>
      </div>
    </div>
    <?php echo $sf_content ?>
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="span12">by <a title="Follow us on Twitter" href="http://twitter.com/dondouny">@dondouny</a> - <a title="Follow us on Twitter" href="http://twitter.com/spocky12">@spocky12</a> &raquo; <a href="/pages/terms-of-service" title="Terms of service">Terms of service</a> - <a href="/pages/privacy-policy" title="Privacy policy">Privacy policy</a></div>
        </div>
      </div>
    </div>
    <?php include_javascripts() ?>
  </body>
</html>
