<?php

/**
 * material actions.
 *
 * @package    proff.dev
 * @subpackage material
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materialActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeTypes(sfWebRequest $request)
  {
    $this->material_type_list = $this->getRoute()->getObjects();
  }

  public function executeType(sfWebRequest $request)
  {
    $this->material_type = $this->getRoute()->getObject();
    $this->material_list = $this->material_type['Material'];
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->material = $this->getRoute()->getObject();
    $this->furniture_list = $this->material['Type']['MaterialFurniture'];
  }
}
