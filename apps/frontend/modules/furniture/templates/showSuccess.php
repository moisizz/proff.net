<?php slot('title', $furniture['name']) ?>

<div id="furniture_type">
  Тип мебели: <?php echo link_to($furniture['Type']['name'],
                                 'furniture_type', array('id' => $furniture['type_id']))?>
</div>
<div id="furniture_name">Название: <?php echo $furniture['name'] ?></div>
<div id="furniture_description">Описание: <?php echo $furniture['description'] ?></div>
<div id="furniture_image">
	Картинка: <br />
	<img src="/uploads/furniture/<?php echo $furniture['image']; ?>" width="300" height="300">
</div>

Материалы, подходящие для этой мебели:
<?php include_partial('material/list',array('material_list' => $furniture_materials)) ?>

Сделанные работы, в которых применялась эта мебель
<?php include_partial('portfolio/list', array('portfolio_list' => $furniture_portfolio_list)) ?>