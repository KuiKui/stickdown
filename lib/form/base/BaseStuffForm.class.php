<?php

/**
 * Stuff form base class.
 *
 * @method Stuff getObject() Returns the current form's model object
 *
 * @package    stickdown
 * @subpackage form
 * @author     Deuteron
 */
abstract class BaseStuffForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'board_id'   => new sfWidgetFormPropelChoice(array('model' => 'Board', 'add_empty' => false)),
      'content'    => new sfWidgetFormInputText(),
      'details'    => new sfWidgetFormInputText(),
      'label'      => new sfWidgetFormInputText(),
      'starred'    => new sfWidgetFormInputText(),
      'checked'    => new sfWidgetFormInputText(),
      'order'      => new sfWidgetFormInputText(),
      'ip'         => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'deleted_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'board_id'   => new sfValidatorPropelChoice(array('model' => 'Board', 'column' => 'id')),
      'content'    => new sfValidatorString(array('max_length' => 255)),
      'details'    => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'label'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'starred'    => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'checked'    => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'order'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ip'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'deleted_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stuff[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stuff';
  }


}
