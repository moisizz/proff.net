<?php slot('title', $material['name']) ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<?php use_stylesheet('element_show.css') ?>

<div class="element_information">
  <div class="element_labels">
  	<div>Тип материала:</div>
  	<div>Название:</div>
  	<div>Описание:</div>
  	<div>Картинка:</div>
  </div>
  
  <div class="element_values">
    <div>
      <?php echo link_to($material['Type']['name'], 'material_type', array('id' => $material['type_id']))?>	
    </div>
    
    <div>
    	<?php echo $material['name'] ?>
    </div>
    
    <div>
    	<?php if($material['description'] != ''): ?>
    	  <?php echo $material['description'] ?>
    	<?php else: ?>
    		нет описания
    	<?php endif; ?>
    </div>
    
    <div>
    	<?php $image_path = '/uploads/material/' ?>
    	<a href="<?php echo $image_path . $material['image'] ?>" target="_blank">
    		<?php echo image_tag($image_path . 'thumb_' . $material['image']) ?>
    	</a>  
    </div>
    
    <br>
    
    <div><?php include_component('preorder', 'unitTransfer', array('id' => $material['id'], 'unit_type' => 'material')) ?></div>
  </div>
</div>


<?php include_partial('information/elementList', 
                      array('list_types' => array(array('type' => 'furniture',  
                      																  'list' => $furniture_list)))) ?>