<?php slot('title', 'Наши работы \ ' . $portfolio['name']) ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<?php use_stylesheet('element_show.css') ?>

<div class="element_information">
  <div class="element_labels">
  	<div>Комната:</div>
  	<div>Название:</div>
  	<div>Общая цена:</div>
  	<div>Описание:</div>
  	<div>Картинка:</div>
  </div>
  
  <div class="element_values">
    <div>
      <?php echo link_to($portfolio['Room']['name'], 
      									 'room', 
                         array('id' => $portfolio['room_id']))?>	
    </div>
    
    <div>
    	<?php echo $portfolio['name'] ?>
    </div>
    
    <div class="price_value">
    	<?php if($portfolio['price']): ?>
    	  <?php echo $portfolio['price'] ?> руб.
    	<?php else: ?>
    		пока не указана
    	<?php endif; ?>
    </div>
    
    <div>
    	<?php if($portfolio['description'] != ''): ?>
    	  <?php echo $portfolio['description'] ?>
    	<?php else: ?>
    		нет описания
    	<?php endif; ?>
    </div>
    
    <div>
    	<?php $img_path = '/uploads/portfolio/'; ?>
    	<a href="<?php echo $img_path . $portfolio['image'] ?>" target="_blank">
    		<?php echo image_tag($img_path . 'thumb_' . $portfolio['image']); ?>
    	</a>  
    </div>
    
    <br>
    
    <div><?php include_component('preorder', 
    														 'unitTransfer', 
                                 array('id' => $portfolio['id'], 'unit_type' => 'portfolio')) ?></div>
  </div>
</div>

<?php if(count($portfolio_furniture_list) != 0): ?>
  <?php include_partial('information/elementList', 
                        array('list_types' => array(array('type' => 'furniture',  
                        																	'list' => $portfolio_furniture_list)))) ?>
<?php endif; ?>