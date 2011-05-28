<?php use_stylesheet('furniture_list.css') ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<div id="furniture_list">
	<?php if(count($furniture_list) != 0): ?>
		<?php foreach($furniture_list as $furniture): ?>
			<div class="furniture">
				<div class="furniture_image">
  				<?php echo image_tag('/uploads/furniture/'.$furniture['image'], array('width' => '100')) ?>
				</div>
		    <div class="furniture_inf">
  				<span class="furniture_name">
  				  <?php echo link_to($furniture['name'], 'furniture_show', array('id' => $furniture['id'])) ?><br />
  				</span>
		      <?php include_component('preorder', 'unitTransfer', array('id' => $furniture['id'], 'unit_type' => 'furniture')) ?>
		    </div>
			</div>
	    <?php endforeach; ?>
	<?php else: ?>
		Пусто
	<?php endif; ?>
</div>