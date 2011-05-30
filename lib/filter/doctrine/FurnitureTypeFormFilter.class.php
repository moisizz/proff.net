<?php

/**
 * FurnitureType filter form.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FurnitureTypeFormFilter extends BaseFurnitureTypeFormFilter
{
  public function configure()
  {
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['room_list']->setOption('renderer_class',  $double_list);
    $this->widgetSchema['room_list']->setOption('renderer_options', $renderer_options);
    $this->widgetSchema['room_list']->setLabel('Подходящие для комнат');
  }
}
