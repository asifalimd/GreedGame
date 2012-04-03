<?php

/**
 * greed actions.
 *
 * @package    sf_sandbox
 * @subpackage greed
 * @author     Asif Ali M
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class greedActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute()
  {
    $this->action = $this->getActionName();
    // sample test
    // $dice = array(3, 2, 2, 2, 1, 6, 2, 1, 3, 1, 5, 5, 5, 5, 6, 1, 2, 6, 6, 5, 1, 4, 1);
    // $this->greed->setDice($dice);
  }  

  public function executeIndex(sfWebRequest $request)
  {
    if ($request->hasParameter('play'))
    {  
      $this->throws       = $request->getParameter('throws',5);
      $this->greed  = new GreedGame(array ('throws' => $this->throws));
      $this->greed->throwDice();
      $this->greed->calculateScore();
    }
    
  }  
  
  public function executeNDraws(sfWebRequest $request)
  {
    $this->form = new GreedForm();
    $this->setTemplate('index');
    
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('greed'));
      if ($this->form->isValid())
      {
        $throws = $this->form->getValue('throws');
        $this->greed  = new GreedGame(array ('throws' => $throws));
        $this->greed->throwDice();
        $this->greed->calculateScore();

      }
    }
      
  }
  
  
  
}
