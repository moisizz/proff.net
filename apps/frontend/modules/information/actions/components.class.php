<?php

class informationComponents extends sfComponents
{
  public function executeMainMenu()
  {
    $this->room_list = RoomTable::getInstance()->createQuery('r')
                                               ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                                               ->execute();
                                               
    $this->furniture_type_list = FurnitureTypeTable::getInstance()->createQuery('ft')
                                                                  ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                                                                  ->execute();
                                               
    $this->material_type_list = MaterialTypeTable::getInstance()->createQuery('mt')
                                                                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY)
                                                                ->execute();                                                     
  }
}