<?php

/**
 * material_type module configuration.
 *
 * @package    proff.dev
 * @subpackage material_type
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class material_typeGeneratorConfiguration extends BaseMaterial_typeGeneratorConfiguration
{  
  public function getFieldsList()
  {
    return array(
      'image' => array('is_partial' => true)
    );
  }
}
