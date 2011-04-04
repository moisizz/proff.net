<?php slot('title', $furniture_type['name']) ?>

<div id="furniture_list">
  <?php foreach($furniture_list as $furniture): ?>
  	<div class="furniture">
  	  <?php echo link_to($furniture['name'], 'furniture_show', array('id' => $furniture['id'])) ?>
  	</div>
  <?php endforeach; ?>
</div>