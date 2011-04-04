<?php

/**
 * FurnitureType form base class.
 *
 * @method FurnitureType getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFurnitureTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
      'image'     => new sfWidgetFormTextarea(),
      'room_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Room')),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 255)),
      'image'     => new sfValidatorString(array('max_length' => 511, 'required' => false)),
      'room_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Room', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('furniture_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FurnitureType';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['room_list']))
    {
      $this->setDefault('room_list', $this->object->Room->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveRoomList($con);

    parent::doSave($con);
  }

  public function saveRoomList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['room_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Room->getPrimaryKeys();
    $values = $this->getValue('room_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Room', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Room', array_values($link));
    }
  }

}
