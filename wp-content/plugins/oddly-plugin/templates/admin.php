<div class="wrap">
	<h1>Settings</h1>
	<?php settings_errors(); ?>
	<br>
	<div class="tab-content">
		<div id="tab-1" class="tab-pane">

			<h3>Manage Your Custom Template</h3>

			<?php 
				$options_left = get_option( 'oddly_plugin_tem_left' );
				//echo $options_left;
				$options_right = get_option( 'oddly_plugin_tem_right' );
				//echo $options_right;
				/*if($options_left == 1){
					echo "left";
				}
				if($options_right == 1){
					echo "right";
				}*/
				//$options = get_option( '' );
				//$left = isset($options['left_side']) ? "TRUE" : "FALSE";
				//	$right = isset($option_template['right']) ? "TRUE" : "FALSE";
				//echo $left;
				/*foreach ($options as $option) {
					$left = isset($option['left_side']) ? "TRUE" : "FALSE";
					echo $left;
				}*/
			?>
			
		</div>

		<div id="tab-2" class="tab-pane">		
			<form method="post" action="options.php">
				<?php 
					settings_fields( 'oddly_plugin_tem_settings' );
					do_settings_sections( 'oddly_admin' );
					submit_button();
				?>
			</form>
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