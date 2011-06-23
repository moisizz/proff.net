<?php

/**
 * material actions.
 *
 * @package    proff.dev
 * @subpackage material
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materialActions extends myActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeTypes(sfWebRequest $request)
  {
    $table = 'MaterialType';
    $types_query = Doctrine::getTable($table)->createQuery('m');
    $type_count = sfConfig::get('app_material_types_on_page', 10);
    
    $this->pager = $this->getPager($table, $types_query, $type_count, $request->getParameter('page', 1));
    
    $this->material_type_list = $this->pager->getResults(Doctrine_Core::HYDRATE_ARRAY);
  }

  public function executeType(sfWebRequest $request)
  {
    $this->material_type = $this->getRoute()->getObject();
    $type_id = $this->material_type['id'];
    $material_count = sfConfig::get('app_material_on_type_page', 10);
    $material_query = MaterialTypeTable::getInstance()->getTypeMaterials($type_id);
    
    $this->pager = $this->getPager('MaterialType', $material_query, $material_count, $request->getParameter('page', 1));
    
    $this->material_list = $this->pager->getResults(Doctrine_Core::HYDRATE_ARRAY); 
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->material = $this->getRoute()->getObject();
    $this->furniture_list = $this->material['Furniture'];
  }
}
