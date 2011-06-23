<?php use_stylesheet('furniture_list.css') ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

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
  				  <?php echo link_to($furniture['name'], 
  				  									 'furniture_show', 
  				                     array('id' => $furniture['id'])) ?>
  				</span>
  				
  				<span class="furniture_price"><?php echo $furniture['price'] ?> руб.</span>
  				
  				<br />
		      
  				  <?php include_component('preorder', 
  				  												'unitTransfer', 
  				                          array('id' => $furniture['id'], 'unit_type' => 'furniture')) ?>
		    </div>
		    
		    <div class="furniture_description">
		    	<?php echo $furniture['description'] ?>
		    </div>
			</div>
	    <?php endforeach; ?>
	<?php else: ?>
		Пусто
	<?php endif; ?>
</div>