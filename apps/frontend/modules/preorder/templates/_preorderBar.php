<?php use_stylesheet('preorder_bar.css') ?>

<span id="user_preorder_bar">Элементов в предзаказе: <?php echo $unit_count ?></span><br  />
<?php echo link_to('Посмотреть', 'preorder_show') ?> 
<?php echo link_to('Отправить нам', 'preorder_send') ?> 
<?php echo link_to('Что это такое?', 'preorder_help') ?>
