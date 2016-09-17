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
			<input type="submit" name="step-1" value="Next" />
		</div>
	</fieldset>
</form>
