Список комнат:
<div id="room_list">
  <?php foreach($rooms as $room): ?>
  	<div><?php echo link_to($room['name'], 'room', array('id' => $room['id'])) ?></div>
  <?php endforeach; ?>
</div>

Сделанные работы:
<div id="portfolio_list">
	<?php if(count($portfolio_list) != 0): ?>
  	<?php foreach($portfolio_list as $portfolio): ?>
  		<div class="portfolio">
  			<?php echo link_to($portfolio['name'], 'portfolio_show', array('id' => $portfolio['id'])) ?>
  		</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Нет сделанных работ
  <?php endif; ?>
</div>
