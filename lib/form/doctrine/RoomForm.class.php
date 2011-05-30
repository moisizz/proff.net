<?php

/**
 * Room form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RoomForm extends BaseRoomForm
{
  public function configure()
  {    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema->setLabels(array('furniture_type_list' => 'Подходящие типы мебели'));
    
    $this->widgetSchema['furniture_type_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_type_list']->setOption('renderer_options', $renderer_options);
  }
}
