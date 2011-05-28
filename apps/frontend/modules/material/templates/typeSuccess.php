<?php slot('title', $material_type['name']) ?>

<?php include_partial('material/list', array('material_list' => $material_list)) ?>

<?php include_partial('furniture/pager', array('pager' => $pager)) ?>