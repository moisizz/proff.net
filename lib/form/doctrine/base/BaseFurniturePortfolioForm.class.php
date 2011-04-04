<?php

/**
 * FurniturePortfolio form base class.
 *
 * @method FurniturePortfolio getObject() Returns the current form's model object
 *
 * @package    proff.dev
 * @subpackage form
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFurniturePortfolioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'furniture_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FurnitureType'), 'add_empty' => false)),
      'portfolio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Portfolio'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'furniture_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FurnitureType'))),
      'portfolio_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Portfolio'))),
    ));

    $this->widgetSchema->setNameFormat('furniture_portfolio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FurniturePortfolio';
  }

}
