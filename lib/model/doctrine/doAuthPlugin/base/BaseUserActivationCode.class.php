<?php

/**
 * BaseUserActivationCode
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $code
 * @property User $User
 * 
 * @method integer            getUserId()  Returns the current record's "user_id" value
 * @method string             getCode()    Returns the current record's "code" value
 * @method User               getUser()    Returns the current record's "User" value
 * @method UserActivationCode setUserId()  Sets the current record's "user_id" value
 * @method UserActivationCode setCode()    Sets the current record's "code" value
 * @method UserActivationCode setUser()    Sets the current record's "User" value
 * 
 * @package    proff.dev
 * @subpackage model
 * @author     Лесникова Екатерина
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserActivationCode extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_activation_code');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('code', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}