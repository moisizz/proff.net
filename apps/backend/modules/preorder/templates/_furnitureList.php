<?php use_stylesheet('furniture_list.css') ?>
<?php use_javascript('jquery-1.5.1.js') ?>

<div id="furniture_list">
	<?php if(count($furniture_list) != 0): ?>
		<?php foreach($furniture_list as $furniture): ?>
			<div class="furniture">
				<div class="furniture_image">
					<?php $img_path = '/uploads/furniture/' ?>
					<a href="<?php echo $img_path . $furniture['image'] ?>" target="_blank">
    				<?php echo image_tag($img_path . 'thumb_' . $furniture['image']) ?>
					</a>
				</div>
		    <div class="furniture_inf">
  				<span class="furniture_name">
  				  <?php echo $furniture['name'] ?><br />
  				</span>
		    </div>
			</div>
	    <?php endforeach; ?>
	<?php else: ?>
		Пусто
	<?php endif; ?>
</div>