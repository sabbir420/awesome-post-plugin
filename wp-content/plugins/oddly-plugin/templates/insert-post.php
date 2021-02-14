<div class="wrap">
	<h1>Insert Post</h1>
	<form method="post">
		<label for="url">Enter the URL</label><br>
		<input type="text" name="url" id="url">
		<br><br>
		<button type="submit" name="submit" id="submit" class="button button-primary">Submit</button>
	</form>
	<?php //submit_button(); ?>
</div>

<?php
	//$url = 'https://jsonplaceholder.typicode.com/posts';
	global $wpdb;
	if(isset($_POST['submit'])){
		if(!empty($_POST['url'])){
			$url = $_POST['url'];
			$response = file_get_contents($url);
			//echo $response;
			$response = json_decode($response);
			//print_r($response);
			$x = 0;
			$date = date("Y-m-d H:i:s");
			foreach ($response as $key => $value) {
				if( !empty($value->id) && !empty($value->title) && !empty($value->body) ){
					//echo $value->id;
					$x++;
					$arg = array(
						'post_author' => $value->userId,
		                'post_content' => $value->body, 
		                'post_title' => $value->title,
		                'post_status' => 'publish',
		                'post_type' => 'publication' 
					);
					wp_insert_post( $arg );
					//$my_id = $wpdb->insert_id;
				}
			}
			//echo $x;
			$table = $wpdb->prefix.'history';
			$data = array('url' => $url, 'no_of_posts' => $x, 'timestamp' => $date);
			$format = array('%s','%d');
			$wpdb->insert($table,$data,$format);
			echo '
				<script>
					alert("Your posts have been added.");
				</script>
			';
		}
	}
	
?>