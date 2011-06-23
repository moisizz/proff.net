<?php use_stylesheet('portfolio_list.css') ?>
<?php use_javascript('jquery-1.5.1.js') ?>
<?php use_javascript('unit_transfer.js') ?>

<div id="portfolio_list">
	<?php if(count($portfolio_list) != 0): ?>
  	<?php foreach($portfolio_list as $portfolio): ?>
			<div class="portfolio">
				<div class="portfolio_image">
					<?php $img_path = '/uploads/portfolio/'; ?>
					<a href="<?php echo $img_path . $portfolio['image'] ?>" target="_blank">
    				<?php echo image_tag($img_path . 'thumb_' . $portfolio['image']); ?>
					</a>
				</div>
		    <div class="portfolio_inf">
  				<div class="portfolio_name">
  				  <?php echo link_to($portfolio['name'], 
  				  									 'portfolio_show', 
  				                     array('id' => $portfolio['id'])) ?><br />
  				</div>
  				<div class="portfolio_description">
  					<?php echo $portfolio['description'] ?>
  				</div>
		      <?php include_component('preorder', 
		      												'unitTransfer', 
		                              array('id' => $portfolio['id'], 'unit_type' => 'portfolio')) ?>
		    </div>
			</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Пусто
  <?php endif; ?>
</div>


