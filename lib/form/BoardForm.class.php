<?php

/**
 * Board form.
 *
 * @package    stickdown
 * @subpackage form
 * @author     Deuteron
 */
class BoardForm extends BaseBoardForm
{
  public function configure()
  {
    $this->useFields(array('name'));
    $this->setWidgets(array('name' => new sfWidgetFormInput(array(), array('placeholder' => 'pick a board name'))));

    $this->widgetSchema->setLabels(array('name' => ''));
    $this->widgetSchema->setHelps(array('name' => 'http://stickdown.me/'));
    $this->widgetSchema->setNameFormat('board[%s]');

    $this->setValidators(array(
      'name' => new sfValidatorString(
        array('required' => true, 'max_length' => 128),
        array(
          'required' => "please enter a board name",
          'max_length' => "this board name is too long"
        )
      )
    ));
    $this->widgetSchema->setFormFormatterName('custom');
  }
}
