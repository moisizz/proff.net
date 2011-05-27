<?php use_stylesheet('preorder_bar.css') ?>

<?php if($sf_user->hasAddedUnits()): ?>
  <span id="user_preorder_bar">Элементов в предзаказе: <?php echo $unit_count ?></span><br  />
  <?php echo link_to('Посмотреть', 'preorder_show') ?> 
  <?php echo link_to('Отправить нам', 'preorder_send') ?>
<?php else: ?>
	Предзаказ пуст
<?php endif; ?> 
<?php echo link_to('Отправленные', 'sended_preorder') ?> 
<?php echo link_to('Что это такое?', 'preorder_help') ?> 
<?php echo link_to('Очистить' , 'clear_session') ?>

