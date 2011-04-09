<?php

class myUser extends sfGuardSecurityUser
{
  /**
   * 
   * Защищенная функция для централизации добавления 
   * в предзаказ элементов
   * @param unknown_type $id
   * @param unknown_type $unit_type
   */
  protected function addUnitToPreorder($id, $unit_type)
  {
    if ($this->hasAttribute('preorder')):
      $preorder = $this->getAttribute('preorder');
      $preorder[$unit_type][] = $id;   
    else:
      $this->setAttribute('preorder', array($unit_type => ($id)));
    endif;
  }
  
  /**
   * 
   * Добавление в предзаказ мебели
   * @param unknown_type $id
   */
  public function addFurnitureToPreorder($id)
  {
    $this->addUnitToPreorder($id, 'furniture');
  }
  
  /**
   * 
   * Добавление в предзаказ материала
   * @param unknown_type $id
   */
  public function addMaterialToPreorder($id)
  {
    $this->addUnitToPreorder($id, 'material');
  }
  
  /**
   * 
   * Добавление в предзаказ сделанной ранее работы
   * @param unknown_type $id
   */
  public function addPortfolioToPreorder($id)
  {
    $this->addUnitToPreorder($id, 'portfolio');
  }
  
  /**
   * 
   * Удаление предзаказа из сессии
   */
  protected function removePreorder()
  {
    if ($this->hasAttribute('preorder'))
      $this->getAttributeHolder()->remove('preorder');
  }
  
  public function signOut()
  {
    $this->removePreorder();
    
    parent::signOut();
  }
}

