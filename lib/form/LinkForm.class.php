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
      'scope_id'    => new sfWidgetFormInputHidden(array(), array()),
      'scope_name'  => new sfWidgetFormInputHidden(array(), array()),
      'url'         => new sfWidgetFormInput(array(), array('placeholder' => 'What blah blah ?')),
      'details'     => new sfWidgetFormInput(array(), array('placeholder' => 'Quelques détails ?'))
    ));

    $this->widgetSchema->setLabels(array('url' => null, 'details' => null));
    $this->widgetSchema->setNameFormat('link[%s]');
    $this->widgetSchema->setFormFormatterName('custom');

    $this->setValidators(array(
      'url' => new sfValidatorString(
        array('required' => true, 'min_length' => 4, 'max_length' => 255),
        array(
          'required' => " is required",
          'min_length' => " trop petit",
          'max_length' => " trop grand"
        )
      ),
      'details' => new sfValidatorString(
        array('required' => false, 'min_length' => 4, 'max_length' => 64),
        array(
           'min_length' => " trop petit",
           'max_length' => " trop grand"
        )
      )
    ));

    $this->validatorSchema->setOption('allow_extra_fields', true);
  }
}
