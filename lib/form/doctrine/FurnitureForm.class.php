<?php

/**
 * Furniture form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FurnitureForm extends BaseFurnitureForm
{
  public function configure()
  {
    $directory = '/uploads'.DIRECTORY_SEPARATOR.'furniture'.DIRECTORY_SEPARATOR;
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array('file_src' => $directory.'thumb_'.$this->getObject()->getImage(),
                                                              						 'is_image' => true,
                                                                           'with_delete' => false));

    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['material_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['material_list']->setOption('renderer_options', $renderer_options);
    $this->widgetSchema['portfolio_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['portfolio_list']->setOption('renderer_options', $renderer_options);
    
    $this->widgetSchema->setLabels(array('type_id'        => 'Вид',
    																		 'material_list'  => 'Подходящие материалы',
                                         'portfolio_list' => 'Использовалось в наших работах'));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'furniture', 
    																														'validated_file_class' => 'pfValidatedThumbnailableImage',
                                                                'required' => false));

    unset($this->widgetSchema['preorder_list']);
  }
}
