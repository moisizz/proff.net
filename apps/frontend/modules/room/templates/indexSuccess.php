<?php foreach($rooms as $room): ?>
	<div><?php echo link_to($room['name'], 'room', array('id' => $room['id'])) ?></div>
<?php endforeach; ?>