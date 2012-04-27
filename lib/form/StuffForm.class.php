<?php

/**
 * Stuff form.
 *
 * @package    stickdown
 * @subpackage form
 * @author     Deuteron
 */
class StuffForm extends BaseStuffForm
{
  public function configure()
  {
    $this->useFields(array('content', 'details'));
    $this->setWidgets(array(
      'board_name'  => new sfWidgetFormInputHidden(array(), array()),
      'content'     => new sfWidgetFormInput(array(), array('placeholder' => 'Your stuff')),
      'details'     => new sfWidgetFormInput(array(), array('placeholder' => 'Details (optional)'))
    ));

    $this->widgetSchema->setLabels(array('content' => null, 'details' => null));
    $this->widgetSchema->setNameFormat('stuff[%s]');

    $this->setValidators(array(
      'content' => new stuffContentValidator(),
      'details' => new sfValidatorString(
        array('required' => false, 'max_length' => 64),
        array('max_length' => "is too long")
      )
    ));

    $this->validatorSchema->setOption('allow_extra_fields', true);
  }
}
