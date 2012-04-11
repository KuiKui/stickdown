<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="board" class="container">
  <div class="row">
    <div class="span12">
      <h2>Quickly stick your stuff on <a href="/<?php echo $boardName; ?>"><?php echo $boardName; ?></a> board.</h2>
      <form method="post" class="form-inline">
        <?php echo $form ?>
        <input id="send" type="submit" value="Stick" class="btn-info" title="Stick my stuff" />
      </form>
      <?php if(count($stuffs) > 0): ?>
        <table id="list" class="table">
          <thead><tr><th></th><th></th><th id="stuff">Stuff</th><?php if($hasDetails): ?><th id="details">Details</th><?php endif; ?><th id="date">Date</th><th></th></tr></thead>
          <tbody>
            <?php foreach($stuffs as $stuff): ?>
            <tr id="stuff-<?php echo $stuff->getId()?>" class="<?php if($stuff->getStarred()) echo "starred"?> <?php if($stuff->getChecked()) echo "checked"?>">
              <td class="check"></td>
              <td class="star"></td>
              <td><?php echo link_to_if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $stuff->getContent()), $stuff->getContent(), $stuff->getContent());?></td>
              <?php if($hasDetails): ?><td><?php echo $stuff->getDetails() ?></td><?php endif; ?>
              <td><?php echo $stuff->getCreatedAt('d/m/Y H:i') ?></td>
              <td class="delete"></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
