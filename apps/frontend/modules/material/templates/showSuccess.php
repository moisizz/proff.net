<?php slot('title', $material['name']) ?>

<div id="material_type">
	Тип материала: <?php echo link_to($material['Type']['name'], 
																		'material_type', 
	                                  array('id' => $material['type_id'])) ?>
</div>
<div id="material_name">Название: <?php echo $material['name'] ?></div>
<div id="material_description">Описание: <?php echo $material['description'] ?></div>
<div id="material_image">
	Картинка:<br />
	<img src="/uploads/material/<?php echo $material['image']; ?>" width="300" height="300">
</div>

Мебель, для которой подойдет этот материал:
<div id="material_furniture">
	<?php if(count($furniture_list) != 0): ?>
		<?php foreach($furniture_list as $furniture): ?>
			<div class="furniture">
		    <?php echo link_to($furniture['name'], 'furniture_show', array('id' => $furniture['id'])) ?>
			</div>
	    <?php endforeach; ?>
	<?php else: ?>
	<?php endif; ?>
</div>