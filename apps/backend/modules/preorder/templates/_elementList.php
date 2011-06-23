<?php use_stylesheet('jquery-ui-1.8.13.css') ?>
<?php use_javascript('jquery-ui-1.8.13.js') ?>

<?php slot('js') ?>
	<script type="text/javascript">
  	jQuery(document).ready(function() {
  		$( "#tabs" ).tabs();
		});
	</script>
<?php end_slot(); ?>

<div id="tabs">
	<ul>
		<?php foreach($list_types as $i => $tab): ?>
			<?php 
			  switch ($tab['type'])
			  {
			    case 'furniture':
    		      {
    		        $name = 'Мебель';
    		        break; 
    		      }
			    case 'material':
    		      {
    		        $name = 'Материалы';
    		        break; 
    		      }
			    case 'portfolio':
    		      {
    		        $name = 'Сделанные работы';
    		        break; 
    		      }
			  }
			?>
			
			<li>
				<a href ="#ui-tabs-<?php echo $i+1 ?>">
					<?php echo $name ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	
	<?php foreach($list_types as $i => $tab): ?>
		<div id="ui-tabs-<?php echo $i+1 ?>">
			<?php include_partial('preorder/'.$tab['type'].'List', array($tab['type'].'_list' => $tab['list'])) ?>
		</div>
	<?php endforeach; ?>	
</div>