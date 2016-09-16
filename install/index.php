<?php
if (!defined('ROOT')) exit;

$active_mods = RB_DB_Factory::getActiveMods();

$is_post_request = $_SERVER['REQUEST_METHOD'] === 'POST';
$selected_mod = !empty($_POST['rb_db_module']) ? $_POST['rb_db_module'] : '';

if (!$is_post_request || !in_array($selected_mod, $active_mods)) {
	?>
	<form action="" method="post">
		<fieldset>
			<div class="row">
				<label for="rb_db_module">Database Module:</label>
				
				<select id="rb_db_module" name="rb_db_module">
					<?php
					foreach ($active_mods as $mod) {
						echo '<option value="' . $mod . '">' . $mod . '</option>';
					}
					?>
				</select>
			</div>
			
			<div class="row submit">
				<input type="submit" value="Next" />
			</div>
		</fieldset>
	</form>
	<?php
} else if (empty($_POST['config_constants'])) {
	$config_constants = $selected_mod::get_config_constants();
	
	if (!empty($config_constants)) {
		?>
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
		<?php
	}
}
?>