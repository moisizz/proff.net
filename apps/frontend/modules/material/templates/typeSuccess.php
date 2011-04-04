<?php slot('title', $material_type['name']) ?>

<div id="material_list">
  <?php foreach($material_list as $material): ?>
  	<div class="material">
  	  <?php echo link_to($material['name'], 'material_show', array('id' => $material['id'])) ?>
  	</div>
  <?php endforeach; ?>
</div>