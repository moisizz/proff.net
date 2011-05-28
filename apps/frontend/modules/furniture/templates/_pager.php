<?php use_stylesheet('pager.css') ?>

<?php
  $sf_request_context = $sf_request->getRequestContext();
  $uri = $sf_request_context['prefix'] . $sf_request_context['path_info'] . '?page=';  
?>

<div class="pager">
<?php if($pager->haveToPaginate()): ?>
  <a href="<?php echo $uri.$pager->getFirstPage() ?>">
    <div id="first_page"></div>
  </a>

  <a href="<?php echo $uri.$pager->getPreviousPage() ?>">
    <div id ="prev_page"></div>
  </a>

  <div class="pages">
    <?php foreach($pager->getLinks() as $page ): ?>
      <?php if ($page == $pager->getPage()): ?>
        <span style="font-size:14px; color:red; font-weight:bold"><?php echo $page ?></span>
      <?php else: ?>
        <a href="<?php echo $uri.$page ?>">
          <?php echo $page; ?>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  
  <a href="<?php echo $uri.$pager->getNextPage() ?>">
    <div id ="next_page"></div>
  </a>

  <a href="<?php echo $uri.$pager->getLastPage() ?>">
    <div id ="last_page"></div>
  </a>

<?php else: ?>
  <span style="font-size:14px; color:white">0</span>
<?php endif; ?>
</div>
