<?php 

class stuffContentValidator extends sfValidatorString
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);

    $this->setOption('max_length', 255);
    $this->setMessage('max_length', 'this stuff is too long...');

    $this->setOption('required', true);
    $this->setMessage('required', 'really want to stick that ?');
  }
}
