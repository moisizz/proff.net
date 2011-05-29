<?php

/**
 * FurniturePortfolio filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFurniturePortfolioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'furniture_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Furniture'), 'add_empty' => true)),
      'portfolio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Portfolio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'furniture_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Furniture'), 'column' => 'id')),
      'portfolio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Portfolio'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('furniture_portfolio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FurniturePortfolio';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'furniture_id' => 'ForeignKey',
      'portfolio_id' => 'ForeignKey',
    );
  }
}
