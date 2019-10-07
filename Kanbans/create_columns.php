<?php

session_start();

include 'includes/dbh.inc.php';

if(isset($_POST['send'])){
										
	if(isset($_SESSION['nb'])){
		for($i = 2; $i < $_SESSION['nb']; $i++){
			if(isset($_POST['submit'. strval($i).''])){
				$title = $_POST['submit'. strval($i).''];
				$newCol = '<div class="container" style="background-color:orange;">
					<h2>'.$title.'</h2>
						<ul class="sortable connectedSortable">  
						</ul>
					</div>';
				file_put_contents("kanbans/".$_SESSION['kanban'], $newCol, FILE_APPEND);
			}
		
		}
		$content = file_get_contents("kanbans/kanban_footer.php");
		file_put_contents("kanbans/".$_SESSION['kanban'], $content, FILE_APPEND);
		
		$uid = $_SESSION['u_uid'];
		$access = $_SESSION['access'];
		$filename = $_SESSION['kanban'];
		$query = "INSERT INTO kanbans(owner, public, filename) VALUES ('$uid', '$access', '$filename')";
		
		/*echo 'uid = '.strval($uid).' & access = '.strval($access).'';*/
		if (!mysqli_query($conn, $query)){
			echo "Error";
		}else{
			header("Location: kanbans/".$_SESSION['kanban']."");
			exit();
		}
		
	}
}
