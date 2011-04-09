<?php

/**
 * PortfolioPreorder filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePortfolioPreorderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'portfolio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Portfolio'), 'add_empty' => true)),
      'preorder_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Preorder'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'portfolio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Portfolio'), 'column' => 'id')),
      'preorder_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Preorder'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('portfolio_preorder_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PortfolioPreorder';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'portfolio_id' => 'ForeignKey',
      'preorder_id'  => 'ForeignKey',
    );
  }
}
