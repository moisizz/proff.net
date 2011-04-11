<?php if((count($furniture_list) == 0) && (count($material_list) == 0) &&  (count($portfolio_list) == 0)): ?>
	Вы пока ничего сюда не добавили
<?php endif;?>

<?php if(count($furniture_list) != 0): ?>
	Мебель:
  <?php include_partial('furniture/list', array('furniture_list' => $furniture_list)) ?>
<?php endif; ?>

<?php if(count($material_list) != 0): ?>
	Материалы:
  <?php include_partial('material/list', array('material_list' => $material_list)) ?>
<?php endif; ?>

<?php if(count($portfolio_list) != 0): ?>
	Наши работы:
  <?php include_partial('portfolio/list', array('portfolio_list' => $portfolio_list)) ?>
<?php endif; ?>