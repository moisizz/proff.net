<?php

/**
 * Material form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MaterialForm extends BaseMaterialForm
{
  public function configure()
  {
    $directory = '/uploads'.DIRECTORY_SEPARATOR.'material'.DIRECTORY_SEPARATOR;
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array('file_src' => $directory.'thumb_'.$this->getObject()->getImage(),
                                                              						 'is_image' => true,
                                                                           'with_delete' => false));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'material', 
    																														'validated_file_class' => 'pfValidatedThumbnailableImage',
                                                                'required' => false));
  
    $this->widgetSchema->setLabels(array('type_id'        => 'Вид',
																		 		 'furniture_list'  => 'Подходящая мебель'));
    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');    
    
    $this->widgetSchema['furniture_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_list']->setOption('renderer_options', $renderer_options);    
    
    unset($this->widgetSchema['preorder_list']);
  }
}
