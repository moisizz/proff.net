<?php slot('title', $portfolio['name']) ?>

<div id="portfilio_name">Кодовое имя: <?php echo $portfolio['name'] ?></div>
<div id="portfolio_room">Комната для которой выполнялась работа: <?php echo $portfolio['Room']['name'] ?></div>
<div id="portfolio_description">Описание: <?php echo $portfolio['description'] ?></div>
<div id="portfolio_image">
	Картинка:<br />
	<img src="/uploads/portfolio/<?php echo $portfolio['image']; ?>" width="300" height="300">
</div>

Мебель, изготовленная для этой работы:
<?php include_partial('furniture/list', array('furniture_list' => $portfolio_furniture_list)) ?>