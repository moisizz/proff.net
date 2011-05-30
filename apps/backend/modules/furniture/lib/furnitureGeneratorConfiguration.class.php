<?php

/**
 * furniture module configuration.
 *
 * @package    proff.dev
 * @subpackage furniture
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class furnitureGeneratorConfiguration extends BaseFurnitureGeneratorConfiguration
{  
  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'type_id' => array(),
      'name' => array(),
      'description' => array('is_partial' => true),
      'image' => array('is_partial' => true),
      'material_list' => array(),
      'portfolio_list' => array(),
      'preorder_list' => array(),
    );
  }
}
