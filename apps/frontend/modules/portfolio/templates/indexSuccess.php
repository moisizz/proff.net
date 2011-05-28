<?php slot('title', 'Наше портфолио') ?>

<?php include_partial('portfolio/list', array('portfolio_list' => $portfolio_list)) ?>

<?php include_partial('furniture/pager', array('pager' => $pager)) ?>