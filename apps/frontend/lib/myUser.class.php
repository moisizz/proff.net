<?php

class myUser extends sfBasicSecurityUser
{
  /**
   * 
   * Типы элементов, которые можно добавлять в предзаказ
   * @var unknown_type
   */
  protected $unit_types = array('furniture', 'material', 'portfolio');
  
  /**
   * 
   * Удаление элемента из предзкаказа
   * @param unknown_type $id
   * @param unknown_type $unit_type
   */
  public function removeUnitFromPreorder($id, $unit_type)
  {
    if($this->hasUnit($id, $unit_type))
    {
      $preorder = $this->getAttribute('preorder');
      foreach($preorder[$unit_type] as $i => $unit_id)
      {
        if($unit_id == $id)
        {
          unset($preorder[$unit_type][$i]);
          break;
        } 
      }     
      $this->setAttribute('preorder', $preorder);
      return true;
    }
    else 
      return false;
  }
  
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
  public function removePreorder()
  {
    if ($this->hasAttribute('preorder'))
      $this->getAttributeHolder()->remove('preorder');
  }
   
  /**
   * 
   * Проверка, есть ли в предзаказе элемент
   * указанного типа с указанным идентификатором
   * @param unknown_type $id
   * @param unknown_type $unit_type
   */
  public function hasUnit($id, $unit_type)
  {
    $preorder = $this->getAttribute('preorder');

    if(($preorder !== false) && 
       isset($preorder[$unit_type]) &&
       in_array($id, $preorder[$unit_type])) 
    {
      return  true;
    }
    else
      return false;
  }

  /**
   * 
   * Получение предзаказа
   */
  public function getPreorder()
  {
    if($this->hasAttribute('preorder'))
      return $this->getAttribute('preorder');
    else
      return array();
  }
  
  public function getUnitCount()
  {
    if($preorder = $this->getAttribute('preorder')):
      $count = 0;    
    
      foreach ($this->unit_types as $type)
      {
        if(isset($preorder[$type]))
        {
          $count += count($preorder[$type]);
        }
      }

      return $count;
    else:
      return 0;
    endif;
  }
  
  /**
   * 
   * Проверка, есть ли добавленные в предзаказ
   * элементы
   */
  public function hasAddedUnits()
  {
    //Если предзаказ вообще есть в сессии
    if($this->hasAttribute('preorder')):
      $preorder = $this->getAttribute('preorder');
      
      //Проверяем, есть ли хоть один ненулевой массив элементов
      foreach($preorder as $unit_array)
      {
        if(count($unit_array) > 0)
        {
          //Если есть, то дальше проверять не нужно, 
          //сообщаем, что добавленные элементы есть
          return true;
        }
      }
    endif;
    
    //Если дошли до сюда - значит либо предзаказа нет в сессии,
    //либо нет добавленных элементов
    return false;
  }

  /**
   * 
   * Запоминает время, когда был отправлен предзаказ
   */
  public function rememberPreorderSendTime()
  {
    $this->setAttribute('send_time', time());
  }

  /**
   * 
   * Проверяет, прошло ли достаточно времени с момента
   * отправки предзаказа
   */
  public function isPassPreorderSendTimeWait()
  {
    $send_time = $this->getAttribute('send_time');
        
    if( ($send_time !== false) && ((time()-$send_time) >= sfConfig::get('preorder_send_time_wait', 1800)) )
      return true;
    else
      return false;
  }
  
}

