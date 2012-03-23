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
    <?php include_javascripts() ?>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-30234218-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </head>
  <body>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a id="brand" title="Stickdown.me, quickly stick your stuff." class="brand" href="/"><strong>Stick</strong>down.me</a>
        <ul class="nav pull-right">
          <li><a title="Twitter" href="http://twitter.com/deuteronsoft">Twitter</a></li>
          <li><a title="Blog" href="http://deuteron.fr/blog">Blog</a></li>
        </ul>
        </div>
      </div>
    </div>
    <?php echo $sf_content ?>
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="span12">by <a href="http://deuteron.fr" title="Deuteron">Deuteron</a>, France.</div>
        </div>
      </div>
    </div>
  </body>
</html>
