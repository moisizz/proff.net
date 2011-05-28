<div id="user_preorder_bar">
	<div id="preorder_bar_title">
  	<div>Предзаказ</div>
    <span class="help"><?php echo link_to('что это такое', 'preorder_help') ?></span>
	</div><br>
	<div id="preorder_unit_count">
  	Добавлено элементов: <span class="count"><?php echo $unit_count ?></span> <?php echo link_to('открыть', 'preorder_show') ?>
	</div>
  	<?php echo link_to('Недавно отправленные', 'sended_preorder') ?> 
</div>
  
  
   
  

