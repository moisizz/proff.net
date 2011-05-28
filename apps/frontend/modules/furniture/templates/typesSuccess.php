<?php slot('title', 'Виды мебели')?>

<?php include_partial('furniture/types', array('furniture_type_list' => $furniture_types)) ?>

<?php include_partial('furniture/pager', array('pager' => $pager)) ?>