<?php

/**
 * preorder actions.
 *
 * @package    proff.dev
 * @subpackage preorder
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class preorderActions extends sfActions
{
  public function executeAddUnit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $unit_type = $request->getParameter('unit_type');
    
    $this->add_result = $this->getUser()->addUnitToPreorder($id, $unit_type);
  }
}
