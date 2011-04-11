<?php slot('title', 'Отправка предзаказа нам') ?>

<?php if($sf_user->hasAddedUnits()): ?>
  <?php use_stylesheet('preorder_form.css') ?>
  <?php include_partial('preorder/sendForm', array('form' => $form)) ?>
  Ваш предзаказ:
  <?php include_partial('preorder/list', array('furniture_list' => $furniture_list, 
  																						 'material_list' => $material_list, 
  																						 'portfolio_list' => $portfolio_list)) ?>
<?php else: ?>
	Вы еще ничего не добавили в предзаказ, поэтому отправлять нечего!
<?php endif; ?>