<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="home" class="container">
  <div class="row">
    <div class="span12">
      <h2>Quickly stick your stuff.</h2>
      <form method="post" class="form-inline">
        <?php echo $form ?>
        <input id="send" type="submit" value="Go" class="btn-info" title="Go to this board" />
      </form>
    </div>
  </div>
  <div class="features row">
    <div class="feature span4">
      <h3>Your stuff</h3>
      <p>Easily save the favorite links, quick notes or todo lists you want to keep within reach.</p>
    </div>
    <div class="feature span4">
      <h3>Everywhere</h3>
      <p>Retrieve and share them quickly on a public, always accessible page, from any web connected device.</p>
    </div>
    <div class="feature span4">
      <h3>Now</h3>
      <p>No account is required, just go to <strong>http://stickdown.me/whatever-you-want</strong> and start adding stuff.</p>
    </div>
  </div>
</div>
