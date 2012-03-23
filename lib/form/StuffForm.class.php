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
      'content' => new sfValidatorString(
        array('required' => true, 'max_length' => 255),
        array(
          'required' => "really want to stick that ?",
          'max_length' => "this stuff is too long..."
        )
      ),
      'details' => new sfValidatorString(
        array('required' => false, 'max_length' => 64),
        array(
          'max_length' => "is too long"
        )
      )
    ));

    $this->validatorSchema->setOption('allow_extra_fields', true);
  }
}
