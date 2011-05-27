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
    $this->disableLocalCSRFProtection();
    
    $this->widgetSchema->setLabels(array('first_name'  => 'Имя',
                                         'last_name'   => 'Фамилия',
                                         'middle_name' => 'Отчество',
                                         'description' => 'Пожелания'));
    
    $this->validatorSchema['first_name']->setMessage('max_length', 'Слишком длинная строка');
    $this->validatorSchema['last_name']->setMessage('max_length', 'Слишком длинная строка');
    $this->validatorSchema['middle_name']->setMessage('max_length', 'Слишком длинная строка');
    $this->validatorSchema['description']->setMessage('max_length', 'Слишком длинная строка');
    
    
    $this->useFields(array('first_name', 'last_name', 'middle_name', 'description'));
  }
  
  public function doSave($conn = null)
  {    
    parent::doSave($conn);
    
    $user = sfContext::getInstance()->getUser();
    $preorder = $user->getPreorder();
    
    $preorder_id = $this->getObject()->getId();

    if(isset($preorder['furniture']))
      foreach($preorder['furniture'] as $furniture_id)
      {
        $bind = new FurniturePreorder();
        $bind->setPreorderId($preorder_id);
        $bind->setFurnitureId($furniture_id);
        $bind->save();
      }

    
    if(isset($preorder['material']))
      foreach($preorder['material'] as $material_id)
      {
        $bind = new MaterialPreorder();
        $bind->setPreorderId($preorder_id);
        $bind->setMaterialId($material_id);
        $bind->save();
      }
      
    if(isset($preorder['portfolio']))
      foreach($preorder['portfolio'] as $portfolio_id)
      {
        $bind = new PortfolioPreorder();
        $bind->setPreorderId($preorder_id);
        $bind->setPortfolioId($portfolio_id);
        $bind->save();
      }
    
    $user->removePreorder();
  }
}
