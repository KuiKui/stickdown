<?php

/**
 * home actions.
 *
 * @package    stickdown
 * @subpackage board
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class boardActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    // Récupération du board
    $this->boardName = $request->getParameter('board');
    $this->currentBoard = BoardQuery::create()
      ->filterByName($this->boardName)
      ->findOne()
    ;

    // Création et configuration du formulaire
    $this->form = new StuffForm();
    $this->form->setDefault('board_name', $this->boardName);
    $this->stuffs = array();

    if($request->isMethod('get'))
    {
      if($this->currentBoard)
      {
        $this->stuffs = StuffPeer::getStuffByBoard($this->currentBoard->getId());
      }
    }
    else if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $this->saveStuff($request);
      }
      else
      {
        if($this->currentBoard)
        {
          $this->stuffs = StuffPeer::getStuffByBoard($this->currentBoard->getId());
        }
      }
    }
  }

  public function saveStuff(sfWebRequest $request)
  {
    // Création du board s'il n'existe pas
    $board = BoardQuery::create()
      ->filterByName($this->form['board_name']->getValue())
      ->findOne()
    ;

    if(!$board)
    {
      $board = new Board();
      $board->setName($this->form['board_name']->getValue())
        ->setIp($_SERVER["REMOTE_ADDR"])
        ->save()
      ;
    }

    // Sauvegarde du nouveau lien
    $stuff = new Stuff();

    if(strlen($this->form['details']->getValue()) > 0)
    {
      $stuff->setDetails($this->form['details']->getValue());
    }

    $stuff
      ->setBoardId($board->getId())
      ->setContent($this->form['content']->getValue())
      ->setIp($_SERVER["REMOTE_ADDR"])
      ->save()
    ;

    $url = $this->context->getRouting()->generate('board', array('board' => $board->getName()));
    $url = str_replace('index.php/', '', $url);

    $this->redirect($url);
  }
}