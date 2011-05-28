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
    $this->getAddedUnits();
  }
  
  public function executeShowSended(sfWebRequest $request)
  {
    $this->preorder_list = $this->getUser()->getSendedPreorders();
  }
  
  public function executeAddUnit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $unit_type = $request->getParameter('unit_type');
    
    $this->add_result = $this->getUser()->addUnitToPreorder($id, $unit_type);
    
    if($request->isXmlHttpRequest())
    {
      $new_url = $this->generateUrl('remove_unit', array('id' => $id, 'unit_type' => $unit_type));
      if($this->add_result)
        return $this->renderText('{"result":true, "type":"added", "new_url":"'.$new_url.'"}');
      else
        return $this->renderText('{"result":false, "type":"added", "new_url":"'.$new_url.'"}');
    }
  }
  
  public function executeRemoveUnit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $unit_type = $request->getParameter('unit_type');
    
    $this->remove_result = $this->getUser()->removeUnitFromPreorder($id, $unit_type);
      
    if($request->isXmlHttpRequest())
    {
      $new_url = $this->generateUrl('add_unit', array('id' => $id, 'unit_type' => $unit_type));
      if($this->remove_result)
        return $this->renderText('{"result":true, "type":"removed", "new_url":"'.$new_url.'"}');
      else
        return $this->renderText('{"result":false, "type":"removed", "new_url":"'.$new_url.'"}');
    }
  }
  
  public function executeHelp(sfWebRequest $request)
  {
  }
    
  public function executeSend(sfWebRequest $request)
  {
    $user = $this->getUser();
    if($user->hasAddedUnits()):
      $this->getAddedUnits();
      
      $this->form = new PreorderForm();
      
      if($request->isMethod(sfWebRequest::POST))
      {
        if(!$this->getUser()->isPassPreorderSendTimeWait())
          return sfView::ERROR;
        $this->form->bind($request->getParameter($this->form->getName()));
        if($this->form->isValid())
        {
          $user->rememberPreorderSendTime();
          
          $preorder = $this->form->save();
          $this->preorder_id = $preorder->getId();
          $user->rememberSendedPreorder($this->preorder_id);
          
          return 'After';
        }
      }
     endif;
  }

  /**
   * 
   * Получение списков добавленных в предзаказ элементов
   */
  protected function getAddedUnits()
  {
    $preorder = $this->getUser()->getPreorder();
    
    $this->furniture_list = array();
    $this->material_list = array();
    $this->portfolio_list = array();
    
    if(isset($preorder['furniture']) && (count($preorder['furniture']) != 0))
    {
      $this->furniture_list = FurnitureTable::getInstance()->getFurnitureByIds($preorder['furniture']);      
    }
    
    if(isset($preorder['material']) && (count($preorder['material']) != 0))
    {
      $this->material_list = MaterialTable::getInstance()->getMaterialeByIds($preorder['material']);
    }
    
    if(isset($preorder['portfolio']) && (count($preorder['portfolio']) != 0))
    {
      $this->portfolio_list = PortfolioTable::getInstance()->getPortfolioByIds($preorder['portfolio']);
    }
  }

  public function executeClear(sfWebRequest $request)
  {
    $this->getUser()->getAttributeHolder()->clear();
    $this->redirect($request->getReferer());
  }
}
