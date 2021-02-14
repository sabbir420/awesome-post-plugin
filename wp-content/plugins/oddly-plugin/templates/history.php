<div class="wrap">
	<h1>History</h1>

	<table id="history" class="display">
	    <thead>
	        <tr>
	            <th>URL</th>
	            <th>No of Posts</th>
	            <th>Timestamp</th>
	        </tr>
	    </thead>
	    <tbody>
	        <?php
	        	global $wpdb;
	        	$q = "SELECT * FROM $wpdb->history";
				$results = $wpdb->get_results($q);				
				foreach ($results as $result) {
	        ?>
	        <tr>
	        	<td><?php echo $result->url ?></td>
	        	<td><?php echo $result->no_of_posts ?></td>
	        	<td><?php echo $result->timestamp ?></td>
	        </tr>
	        <?php
	        	}
	        ?>
	    </tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#history').DataTable();
	} );
</script>