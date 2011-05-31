<?php slot('title', $room['name']) ?>

Типы мебели подходящие для этой комнаты:
<?php include_partial('furniture/types', array('furniture_type_list' => $room_furniture_type_list)) ?>

Список сделанных работ для этой комнаты:
<?php include_partial('portfolio/list', array('portfolio_list' => $portfolio_list)) ?>