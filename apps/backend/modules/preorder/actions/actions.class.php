<?php

require_once dirname(__FILE__).'/../lib/preorderGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/preorderGeneratorHelper.class.php';

/**
 * preorder actions.
 *
 * @package    proff.dev
 * @subpackage preorder
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class preorderActions extends autoPreorderActions
{
	public function executeListShow(sfWebRequest $request)
	{
        $this->preorder = $this->getRoute()->getObject();
	}
}
