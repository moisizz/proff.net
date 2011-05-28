<?php

class myActions extends sfActions
{	
  /**
   * 
   * Метод, позволяющий создавать пейджер одной строкой
   * @param unknown_type $table
   * @param unknown_type $q
   * @param unknown_type $elements
   * @param unknown_type $page
   */
  protected function getPager($table, $q, $elements, $page)
	{
	  $pager = new sfDoctrinePager($table, $elements);
  	
  	$pager->setQuery($q);
    $pager->setPage($page);
    $pager->init();
    
    return $pager;
	}
}
