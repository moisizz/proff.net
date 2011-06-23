<?php

/**
 * BaseFurniture
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $image
 * @property FurnitureType $Type
 * @property Doctrine_Collection $Material
 * @property Doctrine_Collection $Portfolio
 * @property Doctrine_Collection $FurnitureMaterial
 * @property Doctrine_Collection $FurniturePortfolio
 * @property Doctrine_Collection $FurniturePreorder
 * @property Doctrine_Collection $Preorder
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getTypeId()             Returns the current record's "type_id" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getDescription()        Returns the current record's "description" value
 * @method float               getPrice()              Returns the current record's "price" value
 * @method string              getImage()              Returns the current record's "image" value
 * @method FurnitureType       getType()               Returns the current record's "Type" value
 * @method Doctrine_Collection getMaterial()           Returns the current record's "Material" collection
 * @method Doctrine_Collection getPortfolio()          Returns the current record's "Portfolio" collection
 * @method Doctrine_Collection getFurnitureMaterial()  Returns the current record's "FurnitureMaterial" collection
 * @method Doctrine_Collection getFurniturePortfolio() Returns the current record's "FurniturePortfolio" collection
 * @method Doctrine_Collection getFurniturePreorder()  Returns the current record's "FurniturePreorder" collection
 * @method Doctrine_Collection getPreorder()           Returns the current record's "Preorder" collection
 * @method Furniture           setId()                 Sets the current record's "id" value
 * @method Furniture           setTypeId()             Sets the current record's "type_id" value
 * @method Furniture           setName()               Sets the current record's "name" value
 * @method Furniture           setDescription()        Sets the current record's "description" value
 * @method Furniture           setPrice()              Sets the current record's "price" value
 * @method Furniture           setImage()              Sets the current record's "image" value
 * @method Furniture           setType()               Sets the current record's "Type" value
 * @method Furniture           setMaterial()           Sets the current record's "Material" collection
 * @method Furniture           setPortfolio()          Sets the current record's "Portfolio" collection
 * @method Furniture           setFurnitureMaterial()  Sets the current record's "FurnitureMaterial" collection
 * @method Furniture           setFurniturePortfolio() Sets the current record's "FurniturePortfolio" collection
 * @method Furniture           setFurniturePreorder()  Sets the current record's "FurniturePreorder" collection
 * @method Furniture           setPreorder()           Sets the current record's "Preorder" collection
 * 
 * @package    proff.dev
 * @subpackage model
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFurniture extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('furniture');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('type_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 511, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 511,
             ));
        $this->hasColumn('description', 'string', 2047, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 2047,
             ));
        $this->hasColumn('price', 'float', null, array(
             'type' => 'float',
             'notnull' => false,
             ));
        $this->hasColumn('image', 'string', 511, array(
             'type' => 'string',
             'notnull' => false,
             'default' => 'default_furn.png',
             'length' => 511,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('FurnitureType as Type', array(
             'local' => 'type_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Material', array(
             'refClass' => 'FurnitureMaterial',
             'local' => 'furniture_id',
             'foreign' => 'material_id'));

        $this->hasMany('Portfolio', array(
             'refClass' => 'FurniturePortfolio',
             'local' => 'furniture_id',
             'foreign' => 'portfolio_id'));

        $this->hasMany('FurnitureMaterial', array(
             'local' => 'id',
             'foreign' => 'furniture_id'));

        $this->hasMany('FurniturePortfolio', array(
             'local' => 'id',
             'foreign' => 'furniture_id'));

        $this->hasMany('FurniturePreorder', array(
             'local' => 'id',
             'foreign' => 'furniture_id'));

        $this->hasMany('Preorder', array(
             'refClass' => 'FurniturePreorder',
             'local' => 'furniture_id',
             'foreign' => 'preorder_id'));
    }
}