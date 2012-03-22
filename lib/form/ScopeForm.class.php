<?php

/**
 * Scope form.
 *
 * @package    stickdown
 * @subpackage form
 * @author     Deuteron
 */
class ScopeForm extends BaseScopeForm
{
  public function configure()
  {
    $this->useFields(array('name'));
    $this->setWidgets(array('name' => new sfWidgetFormInput(array(), array('placeholder' => 'select your zone'))));

    $this->widgetSchema->setLabels(array('name' => null));
    $this->widgetSchema->setNameFormat('scope[%s]');

    $this->setValidators(array(
      'name' => new sfValidatorString(
        array('required' => true, 'max_length' => 128),
        array(
          'required' => "really want to go to that zone ?",
          'max_length' => "is too long"
        )
      )
    ));
  }
}
