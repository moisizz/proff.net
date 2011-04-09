<?php use_stylesheet('portfolio_list.css') ?>

<div id="portfolio_list">
	<?php if(count($portfolio_list) != 0): ?>
  	<?php foreach($portfolio_list as $portfolio): ?>
  		<div class="portfolio">
  			<?php echo link_to($portfolio['name'], 'portfolio_show', array('id' => $portfolio['id'])) ?>
  			<?php include_partial('preorder/add_unit', array('id' => $portfolio['id'], 'unit_type' => 'portfolio')) ?>
  		</div>
  	<?php endforeach; ?>
  <?php else: ?>
  	Пусто
  <?php endif; ?>
</div>
