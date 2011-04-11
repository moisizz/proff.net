<?php echo form_tag_for($form, 'preorder/send') ?>
	<?php foreach($form as $field): ?>
		<div class="field">
			<?php echo $field->renderRow() ?>
		</div>
	<?php endforeach; ?>
	
	<input type="submit" />
<?php echo '</form>' ?>