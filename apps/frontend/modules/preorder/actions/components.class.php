<?php

class preorderComponents extends sfComponents
{
  public function executePreorderBar()
  {
    $user = $this->getUser();
    if($user->hasAddedUnits())
      $this->unit_count = $user->getUnitCount();
    else
      $this->unit_count = 0;
  }
  
  public function executeUnitTransfer()
  {
    if($this->getUser()->hasUnit($this->id, $this->unit_type)):
      $this->transfer_type = 'remove_unit';
      $this->message = 'Убрать';
    else:
      $this->transfer_type = 'add_unit';
      $this->message = 'В черновик';
    endif;
  }
}