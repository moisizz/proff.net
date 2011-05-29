<?php

/**
 * BaseFurniturePortfolio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $furniture_id
 * @property integer $portfolio_id
 * @property Furniture $Furniture
 * @property Portfolio $Portfolio
 * 
 * @method integer            getFurnitureId()  Returns the current record's "furniture_id" value
 * @method integer            getPortfolioId()  Returns the current record's "portfolio_id" value
 * @method Furniture          getFurniture()    Returns the current record's "Furniture" value
 * @method Portfolio          getPortfolio()    Returns the current record's "Portfolio" value
 * @method FurniturePortfolio setFurnitureId()  Sets the current record's "furniture_id" value
 * @method FurniturePortfolio setPortfolioId()  Sets the current record's "portfolio_id" value
 * @method FurniturePortfolio setFurniture()    Sets the current record's "Furniture" value
 * @method FurniturePortfolio setPortfolio()    Sets the current record's "Portfolio" value
 * 
 * @package    proff.dev
 * @subpackage model
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFurniturePortfolio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('furniture_portfolio');
        $this->hasColumn('furniture_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('portfolio_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Furniture', array(
             'local' => 'furniture_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Portfolio', array(
             'local' => 'portfolio_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}