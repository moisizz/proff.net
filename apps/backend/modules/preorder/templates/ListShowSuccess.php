<?php use_javascript('jquery-1.5.1.js') ?>

<?php include_partial('preorder/assets') ?>

Номер черновика: <?php echo $preorder['id'] ?><br />
Отправил черновик: 
<?php 
    if (($preorder['first_name'] != '') or ($preorder['last_name'] != '') or ($preorder['middle_name' != '']))
        echo $preorder['last_name'] . ' ' . $preorder['first_name'] . ' ' . $preorder['middle_name'];
    else
        echo 'Не указано'
?><br /><br />


Добавлено в черновик:
<?php
      include_partial('preorder/elementList', 
                      array('list_types' => array(array('type' => 'material',   'list' => $preorder['Material']),
                                                  array('type' => 'furniture',  'list' => $preorder['Furniture']), 
                                                  array('type' => 'portfolio',  'list' => $preorder['Portfolio'])))) 
?>