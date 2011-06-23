<?php slot('title', 'Просмотр черновика') ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<div><?php echo link_to('Недавно отправленные', 'sended_preorder') ?></div><br />

<?php if((count($material_list)+count($furniture_list)+count($portfolio_list)) != 0): ?>   
<div><?php echo link_to('Отправить нам', 'preorder_send') ?></div>
<?php
      include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'material',   'list' => $material_list),
                                                  array('type' => 'furniture',  'list' => $furniture_list), 
                                                  array('type' => 'portfolio',  'list' => $portfolio_list)))) 
?>

<?php else: ?>

Вы пока ничего не добавили в черновик. 
За подробностями обратитесь к разделу 
<?php echo link_to('справка', 'preorder_help') ?>

<?php endif; ?>