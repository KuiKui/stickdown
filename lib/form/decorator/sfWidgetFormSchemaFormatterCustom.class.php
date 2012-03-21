<?php
 
class sfWidgetFormSchemaFormatterCustom extends sfWidgetFormSchemaFormatter
{
  /**
   * @var string
   */
  protected 
    $rowFormat = '
      <div class="control-group">
        %label%
        <div class="controls">
          %field%%hidden_fields%
          %error%
        </div>
      </div>',
    $errorListFormatInARow     = '<div class="help-inline">%errors%</div>',
    $errorRowFormatInARow      = '%error%',
    $namedErrorRowFormatInARow = '%name%: %error%';

  public function generateLabel($name, $attributes = array())
  {
    return parent::generateLabel($name, $attributes + array('class' => 'control-label'));
  }

  public function formatErrorsForRow($errors)
  {
    if (null === $errors || !$errors)
    {
      return '';
    }

    if (!is_array($errors))
    {
      $errors = array($errors);
    }
    
    return strtr($this->getErrorListFormatInARow(), array('%errors%' => implode(', ', $this->unnestErrors($errors))));
  }
}
