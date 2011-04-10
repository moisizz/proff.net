<?php

class preorderComponents extends sfComponents
{
  public function executePreorderBar()
  {
    $this->unit_count = $this->getUser()->getUnitCount();
  }
  
  public function executeUnitTransfer()
  {
    if($this->getUser()->hasUnit($this->id, $this->unit_type)):
      $this->transfer_type = 'remove_unit';
      $this->message = 'Убрать из предзаказа';
    else:
      $this->transfer_type = 'add_unit';
      $this->message = 'Добавить в предзаказ';
    endif;
  }
}