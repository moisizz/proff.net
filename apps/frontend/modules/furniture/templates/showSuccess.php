<?php slot('title', $furniture['name']) ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>


<div id="furniture_type">
  Тип мебели: <?php echo link_to($furniture['Type']['name'],
                                 'furniture_type', array('id' => $furniture['type_id']))?>
</div>
<div id="furniture_name">Название: <?php echo $furniture['name'] ?></div>
<?php include_component('preorder', 'unitTransfer', array('id' => $furniture['id'], 'unit_type' => 'furniture')) ?>
<div id="furniture_description">Описание: <?php echo $furniture['description'] ?></div>
<div id="furniture_image">
	Картинка: <br />
	<?php $image_path = '/uploads/furniture/'; ?>
	<a href="<?php echo $image_path . $furniture['image']; ?>" target="_blank">
  	<?php echo image_tag($image_path . 'thumb_' . $furniture['image']); ?>
	</a>
</div>

<?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'material',  'list' => $furniture_materials), 
                                                  array('type' => 'portfolio', 'list' => $furniture_portfolio_list)))) ?>
