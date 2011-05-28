<?php slot('title', 'Просмотр предзаказа') ?>

<div><?php echo link_to('Недавно отправленные', 'sended_preorder') ?></div>

<?php if((count($material_list)+count($furniture_list)+count($portfolio_list)) != 0): ?>   
<div><?php echo link_to('Отправить нам', 'preorder_send') ?></div>
<?php
      include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'material',   'list' => $material_list),
                                                  array('type' => 'furniture',  'list' => $furniture_list), 
                                                  array('type' => 'portfolio',  'list' => $portfolio_list)))) 
?>

<?php endif; ?>