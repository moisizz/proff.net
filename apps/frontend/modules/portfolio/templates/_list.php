<?php use_stylesheet('portfolio_list.css') ?>

<div id="portfolio_list">
	<?php if(count($portfolio_list) != 0): ?>
  	<?php foreach($portfolio_list as $portfolio): ?>
			<div class="portfolio">
				<div class="portfolio_image">
  				<?php echo image_tag('/uploads/portfolio/'.$portfolio['image'], array('width' => '200')) ?>
				</div>
		    <div class="portfolio_inf">
  				<div class="portfolio_name">
  				  <?php echo link_to($portfolio['name'], 'portfolio_show', array('id' => $portfolio['id'])) ?><br />
  				</div>
  				<div class="portfolio_description">
  					<?php echo $portfolio['description'] ?>
  				</div>
		      <?php include_component('preorder', 'unitTransfer', array('id' => $portfolio['id'], 'unit_type' => 'portfolio')) ?>
		    </div>
			</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Пусто
  <?php endif; ?>
</div>


