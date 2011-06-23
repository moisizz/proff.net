<ul id="navmenu-v"> 
    <li id="menu_room_index">
    	<?php echo link_to('Комнаты <small>►</small>','homepage') ?>
    	<ul>
    	  <?php foreach($room_list as $room): ?>
        	<li>
        		<?php echo link_to($room['name'], 'room', array('id' => $room['id'])) ?>
        	</li>
    	  <?php endforeach; ?>
    	</ul>
    </li> 
    
    <li id="menu_furniture_types">
    	<?php echo link_to('Мебель <small>►</small>','furniture_types') ?>
    	<ul>
    	  <?php foreach($furniture_type_list as $furn_type): ?>
        	<li>
        		<?php echo link_to($furn_type['name'], 'furniture_type', array('id' => $furn_type['id'])) ?>
        	</li>
    	  <?php endforeach; ?>
    	</ul>
    </li> 
    
    <li id="menu_material_types">
    	<?php echo link_to('Материалы <small>►</small>','material_types') ?>
    	<ul>
    	  <?php foreach($material_type_list as $material_type): ?>
        	<li>
        		<?php echo link_to($material_type['name'], 'material_type', array('id' => $material_type['id'])) ?>
        	</li>
    	  <?php endforeach; ?>
    	</ul>
    </li>    
    
    <li id="menu_portfolio_index">
      <?php echo link_to('Портфолио','portfolio') ?>
    </li>
    
    <li id="menu_information_contacts">
      <?php echo link_to('Контакты', 'contacts') ?>
    </li>
    
    <li id="menu_preorder_help">
      <?php echo link_to('Справка', 'preorder_help') ?>
    </li>
</ul>

              
              
            
