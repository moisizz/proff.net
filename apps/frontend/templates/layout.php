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
        echo '.' . $element . ' a { color: black; text-decoration: none; font-weight: bold }';
      ?>
    </style>
  </head>
  <body>
    <div id="main_menu">
      <ul>
        <li class="room_index">
          <?php echo link_to('Комнаты','homepage') ?>
        </li>
        <li class="furniture_types">
          <?php echo link_to('Мебель','furniture_types') ?>
        </li>
        <li class="material_types">
          <?php echo link_to('Материалы','material_types') ?>
        </li>
        <li class="portfolio_index">
          <?php echo link_to('Портфолио','portfolio') ?>
        </li>
        <li class="information_about">
          <?php echo link_to('О фирме', 'about') ?>
        </li>
        <li class="information_contacts">
          <?php echo link_to('Контакты', 'contacts') ?>
        </li>
      </ul>
    </div>


    <div id="content">
      <?php echo $sf_content ?>
    </div>
  </body>
</html>