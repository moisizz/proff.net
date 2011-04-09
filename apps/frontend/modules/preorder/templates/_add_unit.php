<?php if($sf_user->isAuthenticated()):?>
	<span class="add_unit">
    <?php 
      echo link_to('Добавить в предзаказ',
      						 'add_unit', 
                   array('id' => $id, 'unit_type' => $unit_type)) 
    ?>
  </span>
 <?php endif; ?>
