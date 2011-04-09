<?php

/**
 * FurnitureType filter form base class.
 *
 * @package    proff.dev
 * @subpackage filter
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFurnitureTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'     => new sfWidgetFormFilterInput(),
      'room_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Room')),
    ));

    $this->setValidators(array(
      'name'      => new sfValidatorPass(array('required' => false)),
      'image'     => new sfValidatorPass(array('required' => false)),
      'room_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Room', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('furniture_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addRoomListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('RoomFurnitureType.room_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'FurnitureType';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'name'      => 'Text',
      'image'     => 'Text',
      'room_list' => 'ManyKey',
    );
  }
}
