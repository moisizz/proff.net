<?php

/**
 * material module configuration.
 *
 * @package    proff.dev
 * @subpackage material
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materialGeneratorConfiguration extends BaseMaterialGeneratorConfiguration
{  
  public function getFieldsList()
  {
    return array(
      'description' => array('is_partial' => true),
      'image' => array('is_partial' => true),
    );
  }
}
