<?php

/**
 * Preorder filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePreorderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'     => new sfWidgetFormFilterInput(),
      'middle_name'    => new sfWidgetFormFilterInput(),
      'last_name'      => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'furniture_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Furniture')),
      'material_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Material')),
      'portfolio_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Portfolio')),
    ));

    $this->setValidators(array(
      'first_name'     => new sfValidatorPass(array('required' => false)),
      'middle_name'    => new sfValidatorPass(array('required' => false)),
      'last_name'      => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'furniture_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Furniture', 'required' => false)),
      'material_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Material', 'required' => false)),
      'portfolio_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Portfolio', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preorder_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.FurniturePreorder FurniturePreorder')
      ->andWhereIn('FurniturePreorder.furniture_id', $values)
    ;
  }

  public function addMaterialListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.MaterialPreorder MaterialPreorder')
      ->andWhereIn('MaterialPreorder.material_id', $values)
    ;
  }

  public function addPortfolioListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('PortfolioPreorder.portfolio_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Preorder';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'first_name'     => 'Text',
      'middle_name'    => 'Text',
      'last_name'      => 'Text',
      'description'    => 'Text',
      'furniture_list' => 'ManyKey',
      'material_list'  => 'ManyKey',
      'portfolio_list' => 'ManyKey',
    );
  }
}
