<?php

/**
 * home actions.
 *
 * @package    progressboard
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new BoardForm();

    if($request->isMethod('get'))
    {
      
    }
    elseif($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $url = $this->context->getRouting()->generate('board', array('board' => $this->form['name']->getValue()));
        $url = str_replace('index.php/', '', $url);
        $this->redirect($url);
      }
    }
  }

  public function executePrivacyPolicy(sfWebRequest $request)
  {
  }

  public function executeTermsOfService(sfWebRequest $request)
  {
  }
}
