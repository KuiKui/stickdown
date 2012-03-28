<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="board" class="container">
  <div class="row">
    <div class="span12">
      <h2><a href="/<?php echo $boardName; ?>"><?php echo $boardName; ?></a>, quickly stick your stuff.</h2>
      <form method="post" class="form-inline">
        <?php echo $form ?>
        <input id="send" type="submit" value="Stick" class="btn-info" title="Stick my stuff" />
      </form>
      <?php if(count($stuffs) > 0): ?>
        <table id="list" class="table">
          <thead><tr><th id="stuff">Stuff</th><th id="details">Details</th><th id="date">Date</th></tr></thead>
          <tbody>
            <?php foreach($stuffs as $stuff): ?>
            <tr>
              <td><?php echo link_to_if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $stuff->getContent()), $stuff->getContent(), $stuff->getContent());?></td>
              <td><?php echo $stuff->getDetails() ?></td>
              <td><?php echo $stuff->getCreatedAt('d/m/Y H:i') ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
