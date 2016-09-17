<form action="" method="post">
	<fieldset>
		<?php
		if (isset($errors)) {
			echo '<ul class="errors">';
			
			foreach ($errors as $error) {
				echo '<li>' . $error . '</li>';
			}
			
			echo '</ul>';
		}
		
		foreach ($config_constants as $constant => $options) {
			$value = isset($_POST['config_constants'][$constant]) ? $_POST['config_constants'][$constant] : $options['default'];
			?>
			<div class="row">
				<label for="config_const_<?php echo $constant; ?>" class="<?php echo ($options['required']) ? 'required' : ''; ?>"><?php echo $options['label']; ?></label>
				
				<input type="text" id="config_const_<?php echo $constant; ?>" name="config_constants[<?php echo $constant; ?>]" value="<?php echo $value; ?>" />
			</div>
			<?php
		}
		?>
		
		<div class="row submit">
			<input type="hidden" name="rb_db_module" value="<?php echo $rb_db_module; ?>" />
			<input type="submit" name="step-2" value="Save" />
		</div>
	</fieldset>
</form>
