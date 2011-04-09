<?php

class preorderComponents extends sfComponents
{
  public function executePreorderBar()
  {
    $this->unit_count = $this->getUser()->getUnitCount();
  }
}