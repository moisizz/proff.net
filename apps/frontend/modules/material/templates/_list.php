<?php use_stylesheet('material_list.css') ?> 

<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<div id="material_list">
  <?php if(count($material_list) != 0): ?>	
    <?php foreach($material_list as $material): ?>
			<div class="material">
				<div class="material_image">
  				<?php echo image_tag('/uploads/material/'.$material['image'], array('width' => '100')) ?>
				</div>
		    <div class="material_inf">
  				<div class="material_name">
  				  <?php echo link_to($material['name'], 'material_show', array('id' => $material['id'])) ?><br />
  				</div>
  				<div class="material_description">
  					<?php echo $material['description'] ?>
  				</div>
		      <?php include_component('preorder', 'unitTransfer', array('id' => $material['id'], 'unit_type' => 'material')) ?>
		    </div>
			</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Нет материалов для данной мебели
  <?php endif; ?>
</div>

