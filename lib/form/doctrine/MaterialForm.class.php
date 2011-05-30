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
    $object = $this->getObject();
    $thumbnail = $directory.'thumb_'.$object->getImage();
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array('file_src' => $thumbnail,
                                                              						 'is_image' => true,
                                                                           'with_delete' => false));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'material', 
    																														'validated_file_class' => 'pfValidatedThumbnailableImage',
                                                                'required' => false));
  
    $this->widgetSchema->setLabels(array('type_id'        => 'Вид',
																		 		 'furniture_list'  => 'Подходящая мебель'));
    
    $image = $directory.DIRECTORY_SEPARATOR.$object->getImage();
    $image_template = "<a href='$image' target='_blank'><img src='$thumbnail'><br></a>%input%";
    $this->widgetSchema['image']->setOption('template', $image_template);
    
    $double_list      = 'sfWidgetFormSelectDoubleList';
    $renderer_options = array('label_unassociated' => 'Доступные',
                              'label_associated'   => 'Выбранные');    
    
    $this->widgetSchema['furniture_list']->setOption('renderer_class', $double_list);
    $this->widgetSchema['furniture_list']->setOption('renderer_options', $renderer_options);    
    
    unset($this->widgetSchema['preorder_list']);
  }
}
