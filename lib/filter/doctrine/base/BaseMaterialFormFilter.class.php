<?php

/**
 * Material filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMaterialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(),
      'image'          => new sfWidgetFormFilterInput(),
      'furniture_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Furniture')),
      'preorder_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Preorder')),
    ));

    $this->setValidators(array(
      'type_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Type'), 'column' => 'id')),
      'name'           => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'image'          => new sfValidatorPass(array('required' => false)),
      'furniture_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Furniture', 'required' => false)),
      'preorder_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Preorder', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('material_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.FurnitureMaterial FurnitureMaterial')
      ->andWhereIn('FurnitureMaterial.furniture_id', $values)
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
      ->leftJoin($query->getRootAlias().'.MaterialPreorder MaterialPreorder')
      ->andWhereIn('MaterialPreorder.preorder_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Material';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'type_id'        => 'ForeignKey',
      'name'           => 'Text',
      'description'    => 'Text',
      'image'          => 'Text',
      'furniture_list' => 'ManyKey',
      'preorder_list'  => 'ManyKey',
    );
  }
}
