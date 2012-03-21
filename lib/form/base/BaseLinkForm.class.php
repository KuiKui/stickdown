<?php

/**
 * Link form base class.
 *
 * @method Link getObject() Returns the current form's model object
 *
 * @package    stickdown
 * @subpackage form
 * @author     Deuteron
 */
abstract class BaseLinkForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'scope_id'   => new sfWidgetFormPropelChoice(array('model' => 'Scope', 'add_empty' => false)),
      'url'        => new sfWidgetFormInputText(),
      'details'    => new sfWidgetFormInputText(),
      'label'      => new sfWidgetFormInputText(),
      'ip'         => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'scope_id'   => new sfValidatorPropelChoice(array('model' => 'Scope', 'column' => 'id')),
      'url'        => new sfValidatorString(array('max_length' => 255)),
      'details'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'label'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'ip'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('link[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Link';
  }


}
