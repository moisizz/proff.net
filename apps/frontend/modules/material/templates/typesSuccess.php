<?php slot('title', 'Виды материалов') ?>

<div id="material_type_list">
  <?php foreach($material_type_list as $material_type): ?>
    <div class="material_type">
      <?php echo link_to($material_type['name'], 'material_type', array('id' => $material_type['id'])) ?>
    </div>
  <?php endforeach; ?>
</div>