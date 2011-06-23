<?php

/**
 * Preorder filter form.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PreorderFormFilter extends BasePreorderFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->setLabels(array('furniture_list' => 'По мебели', 
  										 'material_list'  => 'По материалам',
  										 'portfolio_list' => 'По портфолио'));

    $double_list      = 'sfWidgetFormSelectDoubleList';
    
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['furniture_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_list']->setOption('renderer_options', $renderer_options);  	
  	
    $this->widgetSchema['first_name']->setOption('empty_label', 'пустое');
    $this->widgetSchema['middle_name']->setOption('empty_label', 'пустое');
    $this->widgetSchema['last_name']->setOption('empty_label', 'пустое');
    
    $this->widgetSchema['material_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['material_list']->setOption('renderer_options', $renderer_options);
    
    $this->widgetSchema['portfolio_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['portfolio_list']->setOption('renderer_options', $renderer_options);
    
	unset($this->widgetSchema['description']);
  }
}
