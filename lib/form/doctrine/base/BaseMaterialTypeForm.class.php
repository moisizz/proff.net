<?php

/**
 * MaterialType form base class.
 *
 * @method MaterialType getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMaterialTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'description'             => new sfWidgetFormTextarea(),
      'image'                   => new sfWidgetFormTextarea(),
      'material_furniture_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Furniture')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 255)),
      'description'             => new sfValidatorString(array('max_length' => 2047, 'required' => false)),
      'image'                   => new sfValidatorString(array('max_length' => 511, 'required' => false)),
      'material_furniture_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Furniture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('material_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MaterialType';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['material_furniture_list']))
    {
      $this->setDefault('material_furniture_list', $this->object->MaterialFurniture->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMaterialFurnitureList($con);

    parent::doSave($con);
  }

  public function saveMaterialFurnitureList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['material_furniture_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->MaterialFurniture->getPrimaryKeys();
    $values = $this->getValue('material_furniture_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('MaterialFurniture', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('MaterialFurniture', array_values($link));
    }
  }

}
