<?php

/**
 * Link filter form base class.
 *
 * @package    stickdown
 * @subpackage filter
 * @author     Deuteron
 */
abstract class BaseLinkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'scope_id'   => new sfWidgetFormPropelChoice(array('model' => 'Scope', 'add_empty' => true)),
      'url'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'details'    => new sfWidgetFormFilterInput(),
      'label'      => new sfWidgetFormFilterInput(),
      'ip'         => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'scope_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Scope', 'column' => 'id')),
      'url'        => new sfValidatorPass(array('required' => false)),
      'details'    => new sfValidatorPass(array('required' => false)),
      'label'      => new sfValidatorPass(array('required' => false)),
      'ip'         => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('link_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Link';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'scope_id'   => 'ForeignKey',
      'url'        => 'Text',
      'details'    => 'Text',
      'label'      => 'Text',
      'ip'         => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
