<?php

/**
 * Furniture form base class.
 *
 * @method Furniture getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFurnitureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'type_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => false)),
      'name'               => new sfWidgetFormTextarea(),
      'description'        => new sfWidgetFormTextarea(),
      'image'              => new sfWidgetFormTextarea(),
      'material_type_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'MaterialType')),
      'preorder_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Preorder')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'))),
      'name'               => new sfValidatorString(array('max_length' => 511)),
      'description'        => new sfValidatorString(array('max_length' => 2047)),
      'image'              => new sfValidatorString(array('max_length' => 511, 'required' => false)),
      'material_type_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'MaterialType', 'required' => false)),
      'preorder_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Preorder', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('furniture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Furniture';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['material_type_list']))
    {
      $this->setDefault('material_type_list', $this->object->MaterialType->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['preorder_list']))
    {
      $this->setDefault('preorder_list', $this->object->Preorder->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMaterialTypeList($con);
    $this->savePreorderList($con);

    parent::doSave($con);
  }

  public function saveMaterialTypeList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['material_type_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->MaterialType->getPrimaryKeys();
    $values = $this->getValue('material_type_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('MaterialType', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('MaterialType', array_values($link));
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
