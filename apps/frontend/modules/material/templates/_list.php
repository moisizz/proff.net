<?php use_stylesheet('material_list.css') ?> 

<div id="material_list">
  <?php if(count($material_list) != 0): ?>	
    <?php foreach($material_list as $material): ?>
  		<div class="material">
  			<?php echo link_to($material['name'], 'material_show', array('id' => $material['id'])) ?>
  			<?php include_partial('preorder/add_unit', array('id' => $material['id'], 'unit_type' => 'material')) ?>
  		</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Нет материалов для данной мебели
  <?php endif; ?>
</div>