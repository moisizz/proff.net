<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php $main_title = 'proff.m'; ?>
    <title>
      <?php if($title = get_slot('title')): ?>
        <?php echo $main_title . ' \ ' . $title; ?>
      <?php else: ?>
        <?php echo $main_title . ' - изготовление мебели под заказ'; ?>
     <?php endif; ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <style type="text/css">
      <?php 
        $element = $sf_request->getParameter('module') . '_' . $sf_request->getParameter('action');
        echo "#menu_$element > a { color: black !important; }";
      ?>
    </style>
    
    <?php include_slot('js') ?>
  </head>
  <body>
    <?php /*echo link_to('Очистить сессию' , 'clear_session')*/ ?>

    <div id="wrapper">
      <div id="header">
        <div id="logo">
          <div id="company">
            <a href="<?php echo url_for('homepage') ?>">
              proff.m
            </a> 
          </div>
          <div id="slogan"> 
             - лучшая мебель для вашего дома!
          </div>
        </div>
                
        <div id="contacts">
          <img src="/images/phone.png" align="top" />  8(34241) 1-23-45
        </div>
      </div>
      
      <hr class="header-separator" />
      
      <div id="left_sidebar">
        <div id="main_menu">
          <?php include_component('information', 'mainMenu')?>
        </div>
        
        <hr class="header-separator" />
        
        <?php include_component('preorder', 'preorderBar') ?>
      </div>
      
      <div id="content">
        <?php echo $sf_content ?>
      </div>
    </div>
    
    <div id="footer">
      <center>
        © proff.m 2009 - 2011
      </center>
    </div>
  </body>
</html>