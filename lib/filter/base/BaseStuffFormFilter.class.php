<?php

/**
 * Stuff filter form base class.
 *
 * @package    stickdown
 * @subpackage filter
 * @author     Deuteron
 */
abstract class BaseStuffFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'board_id'   => new sfWidgetFormPropelChoice(array('model' => 'Board', 'add_empty' => true)),
      'content'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'details'    => new sfWidgetFormFilterInput(),
      'label'      => new sfWidgetFormFilterInput(),
      'starred'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'checked'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'order'      => new sfWidgetFormFilterInput(),
      'ip'         => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'board_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Board', 'column' => 'id')),
      'content'    => new sfValidatorPass(array('required' => false)),
      'details'    => new sfValidatorPass(array('required' => false)),
      'label'      => new sfValidatorPass(array('required' => false)),
      'starred'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'checked'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'order'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ip'         => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('stuff_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stuff';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'board_id'   => 'ForeignKey',
      'content'    => 'Text',
      'details'    => 'Text',
      'label'      => 'Text',
      'starred'    => 'Number',
      'checked'    => 'Number',
      'order'      => 'Number',
      'ip'         => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'deleted_at' => 'Date',
    );
  }
}
