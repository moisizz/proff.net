<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php if($title = get_slot('title')): ?>
    	<title>
    	  <?php echo $title; ?>
    	</title>
      <?php else: ?>
        <?php include_title(); ?>
     <?php endif; ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <style type="text/css">
      <?php 
        $element = $sf_request->getParameter('module') . '_' . $sf_request->getParameter('action');
        echo "#menu_$element > a { background: #a13a2a !important; }";
      ?>
    </style>
    
    <?php include_slot('js') ?>
  </head>
  <body>
    <?php echo link_to('Очистить сессию' , 'clear_session') ?>

		<div id="wrapper">
			<div id="left_sidebar">
				<div id="main_menu">
          <?php include_component('information', 'mainMenu')?>
        </div>
			
				<?php include_component('preorder', 'preorderBar') ?>
			</div>
      
      <div id="content">
        <?php echo $sf_content ?>
      </div>
		</div>
  </body>
</html>