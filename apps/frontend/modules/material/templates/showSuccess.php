<?php slot('title', $material['name']) ?>

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
	<img src="/uploads/material/<?php echo $material['image']; ?>" width="300">
</div>

<?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'furniture',  
                      																  'list' => $furniture_list)))) ?>