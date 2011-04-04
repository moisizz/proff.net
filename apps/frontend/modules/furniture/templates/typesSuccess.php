<?php slot('title', 'Виды мебели')?>

<div id="furniture_type_list">
  <?php foreach($furniture_types as $furniture_type): ?>
  	<div class="furniture_type">
  		<?php echo link_to($furniture_type['name'], 'furniture_type', array('id' => $furniture_type['id'])) ?>
  	</div>
  <?php endforeach; ?>
</div>