<?php

/**
 * Preorder form base class.
 *
 * @method Preorder getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePreorderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'user_id'        => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'furniture_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Furniture')),
      'material_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Material')),
      'portfolio_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Portfolio')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'        => new sfValidatorInteger(),
      'description'    => new sfValidatorString(array('max_length' => 2047, 'required' => false)),
      'furniture_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Furniture', 'required' => false)),
      'material_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Material', 'required' => false)),
      'portfolio_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Portfolio', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preorder[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preorder';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['furniture_list']))
    {
      $this->setDefault('furniture_list', $this->object->Furniture->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['material_list']))
    {
      $this->setDefault('material_list', $this->object->Material->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['portfolio_list']))
    {
      $this->setDefault('portfolio_list', $this->object->Portfolio->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFurnitureList($con);
    $this->saveMaterialList($con);
    $this->savePortfolioList($con);

    parent::doSave($con);
  }

  public function saveFurnitureList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['furniture_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Furniture->getPrimaryKeys();
    $values = $this->getValue('furniture_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Furniture', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Furniture', array_values($link));
    }
  }

  public function saveMaterialList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['material_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Material->getPrimaryKeys();
    $values = $this->getValue('material_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Material', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Material', array_values($link));
    }
  }

  public function savePortfolioList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['portfolio_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Portfolio->getPrimaryKeys();
    $values = $this->getValue('portfolio_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Portfolio', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Portfolio', array_values($link));
    }
  }

}
