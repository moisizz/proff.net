<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version9 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('quantity_unit', 'text');
        $this->addColumn('quantity_unit', 'name', 'string', '63', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->addColumn('quantity_unit', 'text', 'string', '63', array(
             'notnull' => '1',
             ));
        $this->removeColumn('quantity_unit', 'name');
    }
}