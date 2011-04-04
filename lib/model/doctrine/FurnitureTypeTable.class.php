<?php

/**
 * FurnitureTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FurnitureTypeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object FurnitureTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FurnitureType');
    }
    
    public function getRoomFurnitureTypes($room_id)
    {
      $q = $this->createQuery('f')
                ->where('f.id IN (SELECT frt.furniture_type_id FROM RoomFurnitureType frt WHERE frt.room_id = ?)', $room_id)
                ->setHydrationMode(Doctrine_Core::HYDRATE_ARRAY);
      
      $furniture_list = $q->execute();
      $q->free();
      
      return $furniture_list;
    }
    
    public function getTypeFurniture(Doctrine_Query $q)
    {
      $alias = $q->getRootAlias();
      $q->leftJoin($alias . '.Furniture f');
        
      $furniture_list = $q->execute();
      $q->free();
      
      return $furniture_list;
    }
}