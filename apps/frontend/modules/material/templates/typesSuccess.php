<?php slot('title', 'Виды материалов') ?>

<?php use_stylesheet('material_types.css') ?>

<div id="material_types">
  <?php foreach($material_type_list as $material_type): ?>
    <div class="material_type">
    	<div class="material_type_image">
        <?php echo image_tag('/uploads/material_type/'.$material_type['image'], array('width' => '80')) ?>
    	</div>
    	<div class="material_type_name">
        <?php echo link_to($material_type['name'], 'material_type', array('id' => $material_type['id'])) ?>
    	</div>
    </div>
  <?php endforeach; ?>
</div>

<?php include_partial('furniture/pager', array('pager' => $pager)) ?>