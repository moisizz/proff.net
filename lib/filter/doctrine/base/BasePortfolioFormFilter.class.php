<?php

/**
 * Portfolio filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePortfolioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'room_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Room'), 'add_empty' => true)),
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(),
      'image'          => new sfWidgetFormFilterInput(),
      'date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'furniture_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Furniture')),
      'preorder_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Preorder')),
    ));

    $this->setValidators(array(
      'room_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Room'), 'column' => 'id')),
      'name'           => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'image'          => new sfValidatorPass(array('required' => false)),
      'date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'furniture_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Furniture', 'required' => false)),
      'preorder_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Preorder', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('portfolio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addFurnitureListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.FurniturePortfolio FurniturePortfolio')
      ->andWhereIn('FurniturePortfolio.furniture_id', $values)
    ;
  }

  public function addPreorderListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.PortfolioPreorder PortfolioPreorder')
      ->andWhereIn('PortfolioPreorder.preorder_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Portfolio';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'room_id'        => 'ForeignKey',
      'name'           => 'Text',
      'description'    => 'Text',
      'image'          => 'Text',
      'date'           => 'Date',
      'furniture_list' => 'ManyKey',
      'preorder_list'  => 'ManyKey',
    );
  }
}
