<?php slot('title', $room['name']) ?>

Список типов мебели для этой комнаты
<div id="furniture_types">
	<?php if (count($room_furniture_type_list) != 0): ?>
    <?php foreach($room_furniture_type_list as $furniture_type): ?>
      <div class="furniture_type">
        <?php echo link_to($furniture_type['name'], 'furniture_type', array('id' => $furniture_type['id'])) ?>
      </div>
    <?php endforeach; ?>
	<?php else: ?>
		Нет мебели для этой комнаты
	<?php endif; ?>
</div>

Список сделанных работ для этой комнаты:
<div id="portfolio_list">
	<?php if(count($portfolio_list) != 0): ?>
  	<?php foreach($portfolio_list as $portfolio): ?>
  		<div class="portfolio">
  			<?php echo link_to($portfolio['name'], 'portfolio_show', array('id' => $portfolio['id'])) ?>
  		</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Нет работ, сделанных для этой комнаты
  <?php endif; ?>
</div>
