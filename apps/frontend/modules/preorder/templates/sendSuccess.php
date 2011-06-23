<?php slot('title', 'Отправка черновика нам') ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<?php if($sf_user->hasAddedUnits()): ?>
  <?php use_stylesheet('preorder_form.css') ?>
  <?php include_partial('preorder/sendForm', array('form' => $form)) ?>
  Ваш черновик:

  <?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'furniture',  
                      																  'list' => $furniture_list),
                      
                                                  array('type' => 'material',  
                      																  'list' => $material_list),
                                                  
                                                  array('type' => 'portfolio',  
                      																  'list' => $portfolio_list)))) ?>
<?php else: ?>
	Вы еще ничего не добавили в предзаказ, поэтому отправлять нечего!
<?php endif; ?>
