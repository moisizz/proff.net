<?php

/**
 * BaseMaterial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property MaterialType $Type
 * @property Doctrine_Collection $MaterialPreorder
 * @property Doctrine_Collection $Preorder
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method integer             getTypeId()           Returns the current record's "type_id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method string              getImage()            Returns the current record's "image" value
 * @method MaterialType        getType()             Returns the current record's "Type" value
 * @method Doctrine_Collection getMaterialPreorder() Returns the current record's "MaterialPreorder" collection
 * @method Doctrine_Collection getPreorder()         Returns the current record's "Preorder" collection
 * @method Material            setId()               Sets the current record's "id" value
 * @method Material            setTypeId()           Sets the current record's "type_id" value
 * @method Material            setName()             Sets the current record's "name" value
 * @method Material            setDescription()      Sets the current record's "description" value
 * @method Material            setImage()            Sets the current record's "image" value
 * @method Material            setType()             Sets the current record's "Type" value
 * @method Material            setMaterialPreorder() Sets the current record's "MaterialPreorder" collection
 * @method Material            setPreorder()         Sets the current record's "Preorder" collection
 * 
 * @package    proff.dev
 * @subpackage model
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMaterial extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('material');
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
        $this->hasColumn('image', 'string', 511, array(
             'type' => 'string',
             'notnull' => false,
             'default' => 'default_material.png',
             'length' => 511,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MaterialType as Type', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $this->hasMany('MaterialPreorder', array(
             'local' => 'id',
             'foreign' => 'material_id'));

        $this->hasMany('Preorder', array(
             'refClass' => 'MaterialPreorder',
             'local' => 'material_id',
             'foreign' => 'preorder_id'));
    }
}