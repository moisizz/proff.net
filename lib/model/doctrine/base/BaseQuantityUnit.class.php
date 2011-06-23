<?php

/**
 * BaseQuantityUnit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $Material
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method Doctrine_Collection getMaterial() Returns the current record's "Material" collection
 * @method QuantityUnit        setId()       Sets the current record's "id" value
 * @method QuantityUnit        setName()     Sets the current record's "name" value
 * @method QuantityUnit        setMaterial() Sets the current record's "Material" collection
 * 
 * @package    proff.dev
 * @subpackage model
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuantityUnit extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('quantity_unit');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 63, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 63,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Material', array(
             'local' => 'id',
             'foreign' => 'quantity_id'));
    }
}