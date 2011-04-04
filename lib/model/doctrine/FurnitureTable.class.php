<?php

/**
 * FurnitureTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class FurnitureTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object FurnitureTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Furniture');
    }
    
    public function getFurniture(Doctrine_Query $q)
    {
      $alias = $q->getRootAlias();
      $q->leftJoin($alias.'.Material m')
        ->leftJoin($alias.'.Type t');
      
      $furniture = $q->fetchOne();
      $q->free();
      
      return $furniture;
    }
}