<?php

/**
 * portfolio module configuration.
 *
 * @package    proff.dev
 * @subpackage portfolio
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class portfolioGeneratorConfiguration extends BasePortfolioGeneratorConfiguration
{  
  public function getFieldsList()
  {
    return array(
      'description' => array('is_partial' => true),
      'image' => array('is_partial' => true),
    );
  }
}
