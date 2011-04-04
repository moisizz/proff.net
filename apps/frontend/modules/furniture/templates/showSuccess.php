<?php slot('title', $furniture['name']) ?>

<div id="furniture_type">
  Тип мебели: <?php echo link_to($furniture['Type']['name'],
                                 'furniture_type', array('id' => $furniture['type_id']))?>
</div>
<div id="furniture_name">Название: <?php echo $furniture['name'] ?></div>
<div id="furniture_description">Описание: <?php echo $furniture['description'] ?></div>
<div id="furniture_image">
	Картинка: <br />
	<img src="/uploads/furniture/<?php echo $furniture['image']; ?>" width="300" height="300">
</div>

Материалы, подходящие для этой мебели:
<div id="furniture_materials">
  <?php if(count($furniture_materials) != 0): ?>	
    <?php foreach($furniture_materials as $material): ?>
  		<div class="material">
  			<?php echo link_to($material['name'], 'material_type', array('id' => $material['id'])) ?>
  		</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Нет материалов для данной мебели
  <?php endif; ?>
</div>