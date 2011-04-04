<?php

/**
 * furniture actions.
 *
 * @package    proff.dev
 * @subpackage furniture
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class furnitureActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeTypes(sfWebRequest $request)
  {
    $this->furniture_types = $this->getRoute()->getObjects();
  }

  public function executeType(sfWebRequest $request)
  {
    $this->furniture_type = $this->getRoute()->getObject();
    $this->furniture_list = $this->furniture_type['Furniture'];
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->furniture = $this->getRoute()->getObject();
    $this->furniture_materials = $this->furniture['Material'];
    $this->furniture_portfolio_list = $this->furniture['Portfolio'];
  }
}
