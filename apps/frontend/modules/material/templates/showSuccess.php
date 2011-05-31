<?php slot('title', $material['name']) ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<div id="material_type">
	Тип материала: <?php echo link_to($material['Type']['name'], 
																		'material_type', 
	                                  array('id' => $material['type_id'])) ?>
</div>
<div id="material_name">Название: <?php echo $material['name'] ?></div>
<?php include_component('preorder', 'unitTransfer', array('id' => $material['id'], 'unit_type' => 'material')) ?>
<div id="material_description">Описание: <?php echo $material['description'] ?></div>
<div id="material_image">
	Картинка:<br />
	<?php $image_path = '/uploads/material/' ?>
	<a href="<?php echo $image_path . $material['image'] ?>" target="_blank">
		<?php echo image_tag($image_path . 'thumb_' . $material['image']) ?>
	</a>
</div>

<?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'furniture',  
                      																  'list' => $furniture_list)))) ?>