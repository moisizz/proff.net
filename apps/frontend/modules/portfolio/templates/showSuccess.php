<?php slot('title', $portfolio['name']) ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<div id="portfilio_name">Кодовое имя: <?php echo $portfolio['name'] ?></div>
<?php include_component('preorder', 'unitTransfer', array('id' => $portfolio['id'], 'unit_type' => 'portfolio')) ?>
<div id="portfolio_room">Комната для которой выполнялась работа: <?php echo $portfolio['Room']['name'] ?></div>
<div id="portfolio_description">Описание: <?php echo $portfolio['description'] ?></div>
<div id="portfolio_image">
	Картинка:<br />
	<img src="/uploads/portfolio/<?php echo $portfolio['image']; ?>" width="300">
</div>

<?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'furniture',  
                      																	'list' => $portfolio_furniture_list)))) ?>