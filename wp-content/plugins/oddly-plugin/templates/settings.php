<div class="wrap">
	<h1>Settings</h1>
	<?php settings_errors(); ?>
	<br>
	<div class="tab-content">
		<div id="tab-1" class="tab-pane">

			<h3>Manage Your Custom Taxonomies</h3>

			<?php 
				$options = get_option( 'oddly_plugin_tax' ) ?: array();
				//$option_template = get_option( 'oddly_plugin_tem' );
				//$left = isset($option_template['left']) ? "TRUE" : "FALSE";
				//	$right = isset($option_template['right']) ? "TRUE" : "FALSE";
				//secho $left;
				echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th class="text-center">Hierarchical</th>
				<th class="text-center">Actions</th></tr>';

				//echo '<table class="cpt-table"><tr><th>ID</th><th>Singular Name</th><th class="text-center">Hierarchical</th>
				//<th class="text-center">Left</th><th class="text-center">Right</th><th class="text-center">Actions</th></tr>';

				foreach ($options as $option) {
					$hierarchical = isset($option['hierarchical']) ? "TRUE" : "FALSE";
					//$left = isset($option['left']) ? "TRUE" : "FALSE";
					//$right = isset($option['right']) ? "TRUE" : "FALSE";

					echo "<tr><td>{$option['taxonomy']}</td><td>{$option['singular_name']}</td><td class=\"text-center\">{$hierarchical}</td>
						<td class=\"text-center\">";

					//echo "<tr><td>{$option['taxonomy']}</td><td>{$option['singular_name']}</td><td class=\"text-center\">{$hierarchical}</td>
						//<td class=\"text-center\">{$left}</td><td class=\"text-center\">{$right}</td><td class=\"text-center\">";
					
					echo '<form method="post" action="" class="inline-block">';
					echo '<input type="hidden" name="edit_taxonomy" value="' . $option['taxonomy'] . '">';
					submit_button( 'Edit', 'primary small', 'submit', false);
					echo '</form> ';

					echo '<form method="post" action="options.php" class="inline-block">';
					settings_fields( 'oddly_plugin_tax_settings' );
					echo '<input type="hidden" name="remove" value="' . $option['taxonomy'] . '">';
					submit_button( 'Delete', 'delete small', 'submit', false, array(
						'onclick' => 'return confirm("Are you sure you want to delete this Custom Taxonomy? The data associated with it will not be deleted.");'
					));
					echo '</form></td></tr>';
				}

				echo '</table>';
			?>
			
		</div>

		<div id="tab-2" class="tab-pane">
			<form method="post" action="options.php">
				<?php 
					settings_fields( 'oddly_plugin_tax_settings' );
					//settings_fields( 'oddly_plugin_tem_settings' );
					do_settings_sections( 'oddly_plugin' );
					submit_button();
				?>
			</form>
			<!--<form method="post" action="options.php">
				<?php 
					//settings_fields( 'oddly_plugin_tem_settings' );
					//do_settings_sections( 'oddly_plugin' );
					//submit_button();
				?>
			</form>-->
		</div>

		<!--<div id="tab-3" class="tab-pane">
			<h3>Manage Your Custom Template</h3>
			<form method="post" action="options.php">
				<input type="radio" name="radio" value="left">Left
				<input type="radio" name="radio" value="right">Right
				
			</form>
		</div>-->
	</div>
</div>