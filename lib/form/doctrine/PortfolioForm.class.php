<?php

/**
 * Portfolio form.
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PortfolioForm extends BasePortfolioForm
{
  public function configure()
  {
    $directory = '/uploads'.DIRECTORY_SEPARATOR.'portfolio'.DIRECTORY_SEPARATOR;
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array('file_src' => $directory.'thumb_'.$this->getObject()->getImage(),
                                                              						 'is_image' => true,
                                                                           'with_delete' => false));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array('path' => sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'portfolio', 
    																														'validated_file_class' => 'pfValidatedThumbnailableImage',
                                                                'required' => false));
  }
}
