<?php

/**
 * Room form base class.
 *
 * @method Room getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'name'                => new sfWidgetFormInputText(),
      'furniture_type_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FurnitureType')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255)),
      'furniture_type_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FurnitureType', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Room';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['furniture_type_list']))
    {
      $this->setDefault('furniture_type_list', $this->object->FurnitureType->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFurnitureTypeList($con);

    parent::doSave($con);
  }

  public function saveFurnitureTypeList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['furniture_type_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FurnitureType->getPrimaryKeys();
    $values = $this->getValue('furniture_type_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FurnitureType', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FurnitureType', array_values($link));
    }
  }

}
