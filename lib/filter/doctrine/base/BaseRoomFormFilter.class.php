<?php

/**
 * Room filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'furniture_type_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'FurnitureType')),
    ));

    $this->setValidators(array(
      'name'                => new sfValidatorPass(array('required' => false)),
      'furniture_type_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'FurnitureType', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addFurnitureTypeListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.RoomFurnitureType RoomFurnitureType')
      ->andWhereIn('RoomFurnitureType.furniture_type_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Room';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'name'                => 'Text',
      'furniture_type_list' => 'ManyKey',
    );
  }
}
