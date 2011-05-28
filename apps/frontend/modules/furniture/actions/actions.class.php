<?php

/**
 * furniture actions.
 *
 * @package    proff.dev
 * @subpackage furniture
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class furnitureActions extends myActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeTypes(sfWebRequest $request)
  {
    $table = 'FurnitureType';
    $types_count = sfConfig::get('app_furniture_types_on_page', 10);
    $types_query = Doctrine::getTable($table)->createQuery('t');
    $this->pager = $this->getPager($table, $types_query, $types_count, $request->getParameter('page', 1));
    
    $this->furniture_types = $this->pager->getResults(Doctrine_Core::HYDRATE_ARRAY);
  }

  public function executeType(sfWebRequest $request)
  {
    $this->furniture_type = $this->getRoute()->getObject();
    $type_id = $this->furniture_type['id'];
    $furniture_query = FurnitureTypeTable::getInstance()->getTypeFurnitureQuery($type_id);
    $furniture_count = sfConfig::get('app_furniture_on_type_page', 10);
    
    $this->pager = $this->getPager('Furniture', $furniture_query, $furniture_count, $request->getParameter('page', 1));
    
    $this->furniture_list = $this->pager->getResults(Doctrine_Core::HYDRATE_ARRAY);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->furniture = $this->getRoute()->getObject();
    $this->furniture_materials = $this->furniture['Material'];
    $this->furniture_portfolio_list = $this->furniture['Portfolio'];
  }
}
