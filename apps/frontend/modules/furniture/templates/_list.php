<?php use_stylesheet('furniture_list.css') ?>

<div id="furniture_list">
	<?php if(count($furniture_list) != 0): ?>
		<?php foreach($furniture_list as $furniture): ?>
			<div class="furniture">
		    <?php echo link_to($furniture['name'], 'furniture_show', array('id' => $furniture['id'])) ?>
			</div>
	    <?php endforeach; ?>
	<?php else: ?>
		Пусто
	<?php endif; ?>
</div>