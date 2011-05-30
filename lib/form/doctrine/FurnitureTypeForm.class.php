<?php

/**
 * FurnitureType form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FurnitureTypeForm extends BaseFurnitureTypeForm
{
  public function configure()
  {
    $directory = '/uploads'.DIRECTORY_SEPARATOR.'furniture_type';
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array('file_src' => $directory.DIRECTORY_SEPARATOR.$this->getObject()->getImage(),
                                                              						 'is_image' => true,
                                                                           'with_delete' => false));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'furniture_type', 
    																														'validated_file_class' => 'pfValidatedCover',
                                                                'required' => false));
  
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');
    
    $this->widgetSchema['room_list']->setOption('renderer_class',  $double_list);
    $this->widgetSchema['room_list']->setOption('renderer_options', $renderer_options);
    $this->widgetSchema['room_list']->setLabel('Подходит для комнат');  
  }
}
