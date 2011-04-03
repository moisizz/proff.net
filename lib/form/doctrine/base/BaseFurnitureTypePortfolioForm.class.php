<?php

/**
 * FurnitureTypePortfolio form base class.
 *
 * @method FurnitureTypePortfolio getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFurnitureTypePortfolioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'furniture_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FurnitureType'), 'add_empty' => false)),
      'portfolio_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Portfolio'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'furniture_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FurnitureType'))),
      'portfolio_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Portfolio'))),
    ));

    $this->widgetSchema->setNameFormat('furniture_type_portfolio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FurnitureTypePortfolio';
  }

}
