<?php

/**
 * Preorder form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PreorderForm extends BasePreorderForm
{
  public function configure()
  {   
    $this->widgetSchema->setLabels(array('first_name'  => 'Имя',
                                         'last_name'   => 'Фамилия',
                                         'middle_name' => 'Отчество',
                                         'description' => 'Дополнительные пожелания'));
    
    $this->useFields(array('first_name', 'last_name', 'middle_name', 'description'));
  }
  
  public function doSave($conn = null)
  {    
    parent::doSave($conn);
    
    $user = sfContext::getInstance()->getUser();
    $preorder = $user->getPreorder();
    
    $furniture_list = $preorder['furniture'];
    $material_list  = $preorder['material'];
    $portfolio_list = $preorder['portfolio'];
    
    $preorder_id = $this->getObject()->getId();
    
    foreach($furniture_list as $furniture_id)
    {
      $bind = new FurniturePreorder();
      $bind->setPreorderId($preorder_id);
      $bind->setFurnitureId($furniture_id);
      $bind->save();
    }
    
    foreach($material_list as $material_id)
    {
      $bind = new MaterialPreorder();
      $bind->setPreorderId($preorder_id);
      $bind->setMaterialId($material_id);
      $bind->save();
    }
    
    foreach($portfolio_list as $portfolio_id)
    {
      $bind = new PortfolioPreorder();
      $bind->setPreorderId($preorder_id);
      $bind->setPortfolioId($portfolio_id);
      $bind->save();
    }
    
    $user->removePreorder();
  }
}
