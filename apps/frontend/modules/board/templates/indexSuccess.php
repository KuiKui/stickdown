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
          <thead><tr><th></th><th></th><th></th><th id="stuff">Stuff</th><?php if($hasDetails): ?><th id="details">Details</th><?php endif; ?><th id="date">Date</th><th></th></tr></thead>
          <tbody id="stuffs">
            <?php foreach($stuffs as $stuff): ?>
            <tr id="stuff-<?php echo $stuff['id']?>" class="<?php if($stuff['isStarred']) echo "starred"?> <?php if($stuff['isChecked']) echo "checked"?>">
              <td class="drag" title="Move stuff"></td>
              <td class="check"></td>
              <td class="star"></td>
              <td class="content" <? if(!$stuff['isUrl']): ?>contenteditable="true"<?php endif; ?>><?php echo link_to_if($stuff['isUrl'], $stuff['content'], $stuff['content'], $stuff['content']);?></td>
              <?php if($hasDetails): ?><td><?php echo $stuff->details() ?></td><?php endif; ?>
              <td><?php echo $stuff['date'] ?></td>
              <td class="delete" title="Delete stuff"></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
