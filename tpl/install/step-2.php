<form action="" method="post">
	<fieldset>
		<?php
		foreach ($config_constants as $constant => $options) {
			?>
			<div class="row">
				<label for="config_const_<?php echo $constant; ?>" class="<?php echo ($options['required']) ? 'required' : ''; ?>"><?php echo $options['label']; ?></label>
				
				<input type="text" id="config_const_<?php echo $constant; ?>" name="config_constants[<?php echo $constant; ?>]" value="<?php echo $options['default'] ?>" />
			</div>
			<?php
		}
		?>
		
		<div class="row submit">
			<input type="submit" value="Save" />
		</div>
	</fieldset>
</form>
