<?php slot('title', 'Наше портфолио') ?>

<div id="portfolio_list">
  <?php foreach($portfolio_list as $portfolio): ?>
  	<div class="portfolio">
  		<?php echo link_to($portfolio['name'], 'portfolio_show', array('id' => $portfolio['id'])) ?>
  	</div>
  <?php endforeach; ?>
</div>
