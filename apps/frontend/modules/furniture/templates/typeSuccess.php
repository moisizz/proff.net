<?php slot('title', $furniture_type['name']) ?>

<?php include_partial('furniture/list', array('furniture_list' => $furniture_list)) ?>

<?php include_partial('furniture/pager', array('pager' => $pager)) ?>