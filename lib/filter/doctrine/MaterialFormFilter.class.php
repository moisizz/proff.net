<?php

/**
 * Material filter form.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MaterialFormFilter extends BaseMaterialFormFilter
{
  public function configure()
  {    
    $this->widgetSchema->setLabels(array('type_id'        => 'По виду',
                                         'name'           => 'По названию',
                                         'description'    => 'По описанию',
                                         'furniture_list'  => 'По подходящей мебели'));
    
    $this->widgetSchema['description']->setOption('empty_label', 'пустое');
    $this->widgetSchema['price']->setOption('empty_label', 'пустая');
    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['furniture_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_list']->setOption('renderer_options', $renderer_options);
  }
}
