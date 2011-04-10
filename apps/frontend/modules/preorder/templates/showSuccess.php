<?php if((count($furniture) == 0) && (count($materials) == 0) &&  (count($portfolio) == 0)): ?>
	Вы пока ничего сюда не добавили
<?php endif;?>

<?php if(count($furniture) != 0): ?>
	Мебель:
  <?php foreach($furniture as $furn_unit): ?>
  	<div class="furn_unit">
  	  <?php echo link_to($furn_unit['name'],'furniture_show', array('id' => $furn_unit['id'])) ?>
  	  <?php include_component('preorder', 'unitTransfer', array('id' => $furn_unit['id'], 'unit_type' => 'furniture')) ?>
  	</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if(count($materials) != 0): ?>
	Материалы:
  <?php foreach($materials as $material): ?>
  	<div class="material">
	  	<?php echo link_to($material['name'],'material_show', array('id' => $material['id'])) ?>
	  	<?php include_component('preorder', 'unitTransfer', array('id' => $material['id'], 'unit_type' => 'material')) ?>
  	</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if(count($portfolio) != 0): ?>
	Наши работы:
  <?php foreach($portfolio as $work): ?>
  	<div class="work">
  	  <?php echo link_to($work['name'],'portfolio_show', array('id' => $work['id'])) ?>
  	  <?php include_component('preorder', 'unitTransfer', array('id' => $work['id'], 'unit_type' => 'portfolio')) ?>
  	</div>
	<?php endforeach; ?>
<?php endif; ?>