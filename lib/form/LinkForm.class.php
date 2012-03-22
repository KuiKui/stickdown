<?php

/**
 * Link form.
 *
 * @package    stickdown
 * @subpackage form
 * @author     Deuteron
 */
class LinkForm extends BaseLinkForm
{
  public function configure()
  {
    $this->useFields(array('url', 'details'));
    $this->setWidgets(array(
      'scope_name'  => new sfWidgetFormInputHidden(array(), array()),
      'url'         => new sfWidgetFormInput(array(), array('placeholder' => 'Your stuff')),
      'details'     => new sfWidgetFormInput(array(), array('placeholder' => 'Details (optional)'))
    ));

    $this->widgetSchema->setLabels(array('url' => null, 'details' => null));
    $this->widgetSchema->setNameFormat('link[%s]');

    $this->setValidators(array(
      'url' => new sfValidatorString(
        array('required' => true, 'max_length' => 255),
        array(
          'required' => "really want to stick that ?",
          'max_length' => "is too long"
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
