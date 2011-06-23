<?php slot('title', $room['name']) ?>

<h3>Для выбранной вами комнаты подходят следующие типы мебели:</h3>
<?php include_partial('furniture/types', array('furniture_type_list' => $room_furniture_type_list)) ?>

<h3>Для этой комнаты мы уже сделали:</h3>
<?php include_partial('portfolio/list', array('portfolio_list' => $portfolio_list)) ?>