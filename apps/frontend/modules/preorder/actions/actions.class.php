<?php

/**
 * preorder actions.
 *
 * @package    proff.dev
 * @subpackage preorder
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class preorderActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
    $preorder = $this->getUser()->getPreorder();
    
    $this->furniture = array();
    $this->materials = array();
    $this->portfolio = array();
    
    if(isset($preorder['furniture']) && count($preorder['furniture']) != 0)
    {
      $this->furniture = FurnitureTable::getInstance()->getFurnitureByIds($preorder['furniture']);      
    }
    
    if(isset($preorder['material']) && count($preorder['material']) != 0)
    {
      $this->materials = MaterialTable::getInstance()->getMaterialeByIds($preorder['material']);
    }
    
    if(isset($preorder['portfolio']) && count($preorder['portfolio']) != 0)
    {
      $this->portfolio = PortfolioTable::getInstance()->getPortfolioByIds($preorder['portfolio']);
    }
  }
  
  public function executeAddUnit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $unit_type = $request->getParameter('unit_type');
    
    $this->add_result = $this->getUser()->addUnitToPreorder($id, $unit_type);
  }
  
  public function executeRemoveUnit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $unit_type = $request->getParameter('unit_type');
    
    $this->remove_result = $this->getUser()->removeUnitFromPreorder($id, $unit_type);
  }
}
