<?php

require_once dirname(__FILE__).'/../lib/furnitureGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/furnitureGeneratorHelper.class.php';

/**
 * furniture actions.
 *
 * @package    proff.dev
 * @subpackage furniture
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class furnitureActions extends autoFurnitureActions
{  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try 
      {
        //Запоминаем, какое изображение было до редактирования
        $old_image = $form->getDefault('image');
        $furniture = $form->save();
      } 
      catch (Doctrine_Validator_Exception $e) 
      {
        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }
      
      //Смотрим, какое изображение после сохранения
      $new_image = $furniture['image'];

      //Если оно изменилось
      if($old_image != $new_image)
      {
        //Удаляем старый thumbnail
        $module = $this->getModuleName();
        $file = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$module.DIRECTORY_SEPARATOR.'thumb_'.$old_image;
        unlink($file);
      }
      
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $furniture)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@furniture_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'furniture_edit', 'sf_subject' => $furniture));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
