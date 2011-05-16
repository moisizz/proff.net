<?php use_stylesheet('unit_transfer') ?>

<div class="unit_transfer_block">
	<a href="<?php echo url_for($transfer_type, array('id' => $id, 'unit_type' => $unit_type)) ?>" class="unit_transfer_button">
		<div class="unit_transfer <?php echo $transfer_type.'_image' ?>"></div>
		<span class="message"><?php echo $message ?></span>
	</a>
</div>

