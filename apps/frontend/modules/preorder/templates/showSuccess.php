<?php slot('title', 'Просмотр предзаказа') ?>

<?php include_partial('preorder/list', array('furniture_list' => $furniture_list, 
																						 'material_list'  => $material_list, 
																						 'portfolio_list' => $portfolio_list)) ?>
