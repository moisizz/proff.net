Список комнат:
<div id="room_list">
  <?php foreach($rooms as $room): ?>
  	<div><?php echo link_to($room['name'], 'room', array('id' => $room['id'])) ?></div>
  <?php endforeach; ?>
</div>

Сделанные работы:
<?php include_partial('portfolio/list', array('portfolio_list' => $portfolio_list)) ?>