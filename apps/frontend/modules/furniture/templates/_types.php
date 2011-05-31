<?php use_stylesheet('furniture_types.css') ?>

<div id="furniture_types">
	<?php if (count($furniture_type_list) != 0): ?>
    <?php foreach($furniture_type_list as $furniture_type): ?>
      <div class="furniture_type">
      	<div class="furniture_type_image">
      		<?php $img_src = '/uploads/furniture_type/'.$furniture_type['image']; ?>
        	<?php echo image_tag($img_src) ?>
      	</div>
      	<div class="furniture_type_name">
          <?php echo link_to($furniture_type['name'], 'furniture_type', array('id' => $furniture_type['id'])) ?>
      	</div>
      </div>
    <?php endforeach; ?>
	<?php else: ?>
		Пусто
	<?php endif; ?>
</div>