<?php

/**
 * Portfolio filter form.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PortfolioFormFilter extends BasePortfolioFormFilter
{
  public function configure()
  {    
    $this->widgetSchema->setLabels(array('room_id'        => 'По комнате',
                                         'name'           => 'По названию',
                                         'description'    => 'По описанию',
                                         'date'           => 'По дате выполнения',
                                         'furniture_list' => 'По использованной мебели'));
    
    $this->widgetSchema['description']->setOption('empty_label', 'пусто');
    $this->widgetSchema['date']->setOption('with_empty', false);
    
    $date_template = 'В период
    									<table>
    										<tr><td>с</td><td>%from_date%</td></tr>
    										<tr><td>до</td><td>%to_date%</td></tr>
    									</table>';
    
    $this->widgetSchema['date']->setOption('template', $date_template);
    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['furniture_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_list']->setOption('renderer_options', $renderer_options);
  }
}
