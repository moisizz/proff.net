<?php

class myUser extends sfGuardSecurityUser
{
  /**
   * 
   * Типы элементов, которые можно добавлять в предзаказ
   * @var unknown_type
   */
  protected $unit_types = array('furniture', 'material', 'portfolio');
  
  /**
   * 
   * Добавление элемента в предзаказ
   * @param unknown_type $id
   * @param unknown_type $unit_type
   */
  public function addUnitToPreorder($id, $unit_type)
  {
    //Проверяем, что такой объект вообще есть в базе
    if(in_array($unit_type, $this->unit_types)):
      switch ($unit_type)
      {
        case 'furniture':
          if (!FurnitureTable::getInstance()->findOneById($id))
            return false;
          break;
        case 'material':
          if (!MaterialTable::getInstance()->findOneById($id))
            return false;
          break;
        case 'portfolio':
          if (!PortfolioTable::getInstance()->findOneById($id))
            return false;
          break;
      }
        
      
      if ($this->hasAttribute('preorder')):
        $preorder = $this->getAttribute('preorder');
        
        //Проверяем, есть ли такой же элемент в текущем предзаказе
        if(isset($preorder[$unit_type]) && (in_array($id, $preorder[$unit_type])))
          return false;
        
        $preorder[$unit_type][] = $id;   
        $this->setAttribute('preorder', $preorder);
      else:
        $this->setAttribute('preorder', array($unit_type => array($id)));
      endif;
      return true;
    else:
       return false;
    endif;
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
  
  /**
   * Функция разлогинивания пользователя, дополненная уничтожением
   * незакрытых предзаказов
   * @see sfGuardSecurityUser::signOut()
   */
  public function signOut()
  {
    $this->removePreorder();
    
    parent::signOut();
  }
}

