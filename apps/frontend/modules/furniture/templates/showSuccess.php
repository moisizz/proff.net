<?php slot('title', $furniture['Type']['name'] . ' \ ' . $furniture['name']) ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<?php use_stylesheet('element_show.css') ?>

<div class="element_information">
  <div class="element_labels">
  	<div>Тип мебели:</div>
  	<div>Название:</div>
  	<div>Цена:</div>
  	<div>Описание:</div>
  	<div>Картинка:</div>
  </div>
  
  <div class="element_values">
    <div>
      <?php echo link_to($furniture['Type']['name'], 
      									 'furniture_type', 
                         array('id' => $furniture['type_id']))?>	
    </div>
    
    <div>
    	<?php echo $furniture['name'] ?>
    </div>
    
    <div class="price_value">
    	<?php if($furniture['price']): ?>
    	  <?php echo $furniture['price'] ?> руб.
    	<?php else: ?>
    		пока не указана
    	<?php endif; ?>
    </div>
    
    <div>
    	<?php if($furniture['description'] != ''): ?>
    	  <?php echo $furniture['description'] ?>
    	<?php else: ?>
    		нет описания
    	<?php endif; ?>
    </div>
    
    <div>
    	<?php $image_path = '/uploads/furniture/'; ?>
    	<a href="<?php echo $image_path . $furniture['image']; ?>" target="_blank">
      	<?php echo image_tag($image_path . 'thumb_' . $furniture['image']); ?>
    	</a>  
    </div>
    
    <br>
    
    <div><?php include_component('preorder', 
      													 'unitTransfer', 
                                 array('id'        => $furniture['id'], 
                                 			 'unit_type' => 'furniture')) ?></div>
  </div>
</div>


<?php if(count($furniture_materials) && count($furniture_portfolio_list)): ?>
<?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'material',  'list' => $furniture_materials), 
                                                  array('type' => 'portfolio', 'list' => $furniture_portfolio_list)))) ?>
<?php endif; ?>