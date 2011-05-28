<?php

/**
 * portfolio actions.
 *
 * @package    proff.dev
 * @subpackage portfolio
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class portfolioActions extends myActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $table = 'Portfolio';
    $portfolio_query = Doctrine::getTable($table)->createQuery('p');
    $portfolio_count = sfConfig::get('app_portfolio_on_index_page', 10);
    
    $this->pager = $this->getPager($table, $portfolio_query, $portfolio_count, $request->getParameter('page', 1));
    
    $this->portfolio_list = $this->pager->getResults(Doctrine_Core::HYDRATE_ARRAY);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->portfolio = $this->getRoute()->getObject();
    $this->portfolio_furniture_list = $this->portfolio['Furniture'];
  }
}
