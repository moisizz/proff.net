<?php slot('title', $room['name']) ?>

Список типов мебели для этой комнаты
<?php include_partial('furniture/types', array('furniture_type_list' => $room_furniture_type_list)) ?>

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
