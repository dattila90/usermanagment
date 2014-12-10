

	<div id="body">
		
	<H1><?= $results; ?></H1>

	</div>

	<script type="text/javascript">
	var users_array = [<?php echo json_encode($results);?>];
	// var users_array = [<?php foreach($results as $result) {echo "'id:" . $result->id . "','" . $result->username . "','" . $result->firstname . "','" . $result->lastname . "','" . $result->email . "',";}?>];

	// ['id', 'username', 'firstname', 'lastname', 'email', 'phone'];
	</script>