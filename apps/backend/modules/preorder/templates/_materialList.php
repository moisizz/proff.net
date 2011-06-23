<?php use_stylesheet('material_list.css') ?> 
<?php use_javascript('jquery-1.5.1.js') ?>

<div id="material_list">
  <?php if(count($material_list) != 0): ?>	
    <?php foreach($material_list as $material): ?>
			<div class="material">
				<div class="material_image">
					<?php $img_path = '/uploads/material/'; ?>
					<a href="<?php echo $img_path . $material['image'] ?>" target="_blank">
  				  <?php echo image_tag($img_path . 'thumb_' . $material['image']); ?>
					</a>
				</div>
		    <div class="material_inf">
  				<div class="material_name">
  				  <?php echo $material['name'] ?><br />
  				</div>
  				<div class="material_description">
  					<?php echo $material['description'] ?>
  				</div>
		    </div>
			</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Нет материалов для данной мебели
  <?php endif; ?>
</div>
