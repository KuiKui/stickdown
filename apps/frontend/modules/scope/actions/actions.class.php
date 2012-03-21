<?php

/**
 * home actions.
 *
 * @package    progressboard
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scopeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    // Récupération du scope
    $this->scopeName = $request->getParameter('scope');
    $this->currentScope = ScopeQuery::create()
      ->filterByName($this->scopeName)
      ->findOne()
    ;

    // Création et configuration du formulaire
    $this->form = new LinkForm();
    $this->form->setDefault('scope_name', $this->scopeName);
    $this->links = array();

    if($request->isMethod('get'))
    {
      if($this->currentScope)
      {
        $this->links = LinkPeer::getLinksByScope($this->currentScope->getId());
      }
    }
    else if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $this->saveLink($request);
      }
      else
      {
        if($this->currentScope)
        {
          $this->links = LinkPeer::getLinksByScope($this->currentScope->getId());
        }
      }
    }
  }

  public function saveLink(sfWebRequest $request)
  {
    // Création du scope s'il n'existe pas
    $scope = ScopeQuery::create()
      ->filterByName($this->form['scope_name']->getValue())
      ->findOne()
    ;

    if(!$scope)
    {
      $scope = new Scope();
      $scope->setName($this->form['scope_name']->getValue())
        ->setIp($_SERVER["REMOTE_ADDR"])
        ->save()
      ;
    }

    // Sauvegarde du nouveau lien
    $link = new Link();

    if(strlen($this->form['details']->getValue()) > 0)
    {
      $link->setDetails($this->form['details']->getValue());
    }

    $link
      ->setScopeId($scope->getId())
      ->setUrl($this->form['url']->getValue())
      ->setIp($_SERVER["REMOTE_ADDR"])
      ->save()
    ;

    $url = $this->context->getRouting()->generate('scope', array('scope' => $scope->getName()));
    $url = str_replace('index.php/', '', $url);

    $this->redirect($url);
  }
}
