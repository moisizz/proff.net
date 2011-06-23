<?php if ($preorder_list !== false): ?>
  Недавно отправленные черновики
  <table cellpadding="5">
  	<tr><td><b>Номер</b></td><td><b>Дата</b></td></tr>
    <?php foreach($preorder_list as $preorder): ?>
    	<tr>
    		<td><?php echo $preorder['num'] ?></td>
    		<td><?php echo date('Число: d.m.y Время: H:i:s', $preorder['date']) ?></td>
    	</tr>
    <?php endforeach; ?>
  </table>
<?php else: ?>
	Вы еще не отправляли нам черновиков. За подробностями обратитесь к разделу <?php echo link_to('справка', 'preorder_help') ?>
<?php endif; ?>
