<?php

/**
 * Furniture filter form.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FurnitureFormFilter extends BaseFurnitureFormFilter
{
  public function configure()
  {
    
    $this->widgetSchema->setLabels(array('type_id'        => 'По виду',
                                         'name'           => 'По названию',
                                         'description'    => 'По описанию',
                                         'material_list'  => 'По подходящим материалам',
                                         'portfolio_list' => 'По использованию в наших работах'));
    
    $this->widgetSchema['description']->setOption('empty_label', 'пустое');
    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['material_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['material_list']->setOption('renderer_options', $renderer_options);
    $this->widgetSchema['portfolio_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['portfolio_list']->setOption('renderer_options', $renderer_options);
  }
}
