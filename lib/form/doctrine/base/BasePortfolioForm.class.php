<?php

/**
 * Portfolio form base class.
 *
 * @method Portfolio getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePortfolioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'room_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => false)),
      'name'                => new sfWidgetFormTextarea(),
      'description'         => new sfWidgetFormTextarea(),
      'image'               => new sfWidgetFormTextarea(),
      'date'                => new sfWidgetFormDate(),
      'furniture_type_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FurnitureType')),
      'preorder_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Preorder')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'room_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Room'))),
      'name'                => new sfValidatorString(array('max_length' => 511)),
      'description'         => new sfValidatorString(array('max_length' => 2047, 'required' => false)),
      'image'               => new sfValidatorString(array('max_length' => 511, 'required' => false)),
      'date'                => new sfValidatorDate(array('required' => false)),
      'furniture_type_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FurnitureType', 'required' => false)),
      'preorder_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Preorder', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('portfolio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Portfolio';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['furniture_type_list']))
    {
      $this->setDefault('furniture_type_list', $this->object->FurnitureType->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['preorder_list']))
    {
      $this->setDefault('preorder_list', $this->object->Preorder->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFurnitureTypeList($con);
    $this->savePreorderList($con);

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

  public function savePreorderList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['preorder_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Preorder->getPrimaryKeys();
    $values = $this->getValue('preorder_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Preorder', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Preorder', array_values($link));
    }
  }

}
