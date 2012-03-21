<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="container">
  <div class="row">
    <div class="span12">
      <h2><?php echo $scopeName; ?>, quickly stick your stuff.</h2>
      <form method="POST" class="form">
        <?php echo $form ?>
        <input id="send" type="submit" value="Stick" class="btn-info" title="Stick my stuff" />
      </form>
      <?php if(count($links) > 0): ?>
        <table class="table">
          <thead><tr><th>Stuff</th><th>Details</th><th>Date</th></tr></thead>
          <tbody>
            <?php foreach($links as $link): ?>
            <tr>
              <td><a href="<?php echo $link->getUrl() ?>"><?php echo $link->getUrl() ?></a></td>
              <td><?php echo $link->getDetails() ?></td>
              <td><?php echo $link->getCreatedAt('d/m/Y H:i:s') ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
