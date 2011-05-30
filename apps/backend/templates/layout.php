<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
		<div id="main_menu">
      <ul>
        <li class="room_index">
          <?php echo link_to('Мебель','homepage') ?>
        </li>
        <li class="furniture_types">
          <?php echo link_to('Виды мебели','furniture_type') ?>
        </li>
        <li class="material_types">
          <?php echo link_to('Виды материалов','material_type') ?>
        </li>
        <li class="materials">
          <?php echo link_to('Материалы','material') ?>
        </li>
        <li class="portfolio_index">
          <?php echo link_to('Портфолио','portfolio') ?>
        </li>
        <li class="room_index">
          <?php echo link_to('Комнаты','room') ?>
        </li>
        <li class="preorder">
          <?php echo link_to('Предзаказы', 'preorder') ?>
        </li>
      </ul>
    </div>  
  
  
    <?php echo $sf_content ?>
  </body>
</html>
