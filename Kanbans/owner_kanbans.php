<?php

	session_start();
	
	require 'header.php';
	
?>

<?php
	if(isset($_SESSION['u_id'])){
		
		include 'includes/dbh.inc.php';
		
		$owner = $_SESSION['u_uid'];
		$query = "SELECT filename FROM kanbans WHERE owner = '$owner' ";
		
		$result = mysqli_query($conn, $query);
		
		echo 'These are the kanban board you created (both private & public)';
		
		while($row = mysqli_fetch_assoc($result)) {
			
			echo '<ul>';
			foreach($row as $value) {
				
					echo '<li><a href="kanbans/'.strval($row['filename']).'">'.strval($row['filename']).'</a></li>';
				echo '<br>';
			}
			echo '</ul>';
		}
	}

?>
