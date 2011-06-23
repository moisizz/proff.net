<div id="user_preorder_bar">
	<div id="preorder_bar_title">
  	<b>Черновик</b>
	</div>

	<div id="preorder_unit_count">
  	 <?php echo link_to('Записей', 'preorder_show') ?> - <span class="count"><?php echo $unit_count ?></span>
	</div>
	
	<div>
		<span class="help"><?php echo link_to('Что это?', 'preorder_help') ?></span>
	</div>
</div>