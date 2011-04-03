<?php

/**
 * FurniturePreorder form base class.
 *
 * @method FurniturePreorder getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFurniturePreorderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'furniture_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Furniture'), 'add_empty' => false)),
      'preorder_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Preorder'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'furniture_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Furniture'))),
      'preorder_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Preorder'))),
    ));

    $this->widgetSchema->setNameFormat('furniture_preorder[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FurniturePreorder';
  }

}
