<?php use_stylesheet('send_form.css') ?>

<?php echo form_tag_for($form, 'preorder/send') ?>

<div id="send_form">	
	<div id="form_help">
		Поля ниже не обязательны к заполнению
	</div>

	<div id="form_labels">
		<?php foreach($form as $field): ?>
			<?php if(!$field->isHidden()): ?>
				<div class="form_label">
					<?php echo $field->renderLabel() ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	
	<div id="form_fields">
		<?php foreach($form as $field): ?>
			<?php if(!$field->isHidden()): ?>
				<div class="form_field">
					<?php echo $field->render() ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		
		<div id="form_submit">
    	<button type="submit">
    		<img src="/images/submit_button.gif" align=top> <span>Отправить</span>
    	</button>
		</div>
	</div>
	
	<?php if($form->hasErrors()): ?>
		<div id="form_errors">
  		<?php foreach($form as $field): ?>
  			<?php if(!$field->isHidden()): ?>
  				<div class="form_error">
  					<?php echo $field->getError() ?>
  				</div>
  			<?php endif; ?>
  		<?php endforeach; ?>		
		</div>
	<?php endif; ?>
	
	<?php echo $form->renderHiddenFields(); ?>
</div>
	

<?php echo '</form>' ?>