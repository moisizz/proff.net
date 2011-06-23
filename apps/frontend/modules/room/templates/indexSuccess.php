<?php use_stylesheet('rooms.css'); ?>
<?php use_javascript('jquery-1.5.1.js'); ?>
<?php use_javascript('rooms.js'); ?>


<div id="appartment">
	<div class="room_block" style="margin-left: 150px; width: 389px">
		<a href="<?php echo url_for('room', array('id' => 1)) ?>">
			<div id="livingroom" class="room" room_name="Гостинная"></div>
		</a>
	</div>

	<div id="left_room_block" style="float: left;">
  	<div class="room_block">
  		<a href="<?php echo url_for('room', array('id' => 2)) ?>">
  			<div id="bedroom" class="room" room_name="Спальная"></div>
  		</a>
  	</div>
  
    
    <div class="room_block" style="margin-left: 1px">
    	<a href="<?php echo url_for('room', array('id' => 3)) ?>">
    		<div id="childroom" class="room" room_name="Детская"></div>
    	</a>
    </div>
    
    
    <div class="room_block" style="margin-left: 137px;">
    	<a href="<?php echo url_for('room', array('id' => 4)) ?>">
    		<div id="bathroom" class="room" room_name="Ванная"></div>
    	</a>
    </div>
	</div>
		

  <div class="room_block" style="float: left;">
  	<a href="<?php echo url_for('room', array('id' => 5)) ?>">
  		<div id="hall" class="room" room_name="Прихожая"></div>
  	</a>
  </div>

	
  <div class="room_block" style="float: left;">
  	<a href="<?php echo url_for('room', array('id' => 6)) ?>">
  		<div id="kitchen" class="room" room_name="Кухня"></div>
  	</a>
  </div>
</div>

<!-- Сделанные работы: -->
<?php /*include_partial('portfolio/list', array('portfolio_list' => $portfolio_list))*/ ?>