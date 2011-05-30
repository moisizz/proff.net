<?php

/**
 * Room filter form.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RoomFormFilter extends BaseRoomFormFilter
{
  public function configure()
  {    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema->setLabels(array('name'                => 'По названию',
                                         'furniture_type_list' => 'По подходящим типам мебели'));
    
    $this->widgetSchema['furniture_type_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_type_list']->setOption('renderer_options', $renderer_options);
  }
}
