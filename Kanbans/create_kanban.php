<?php

	session_start();
	
	require 'header.php';
	
?>

   <section class="main-container">
		<div class="main-wrapper">
			<h2>Create a new Kanban board</h2>
			<p>Please select :</p>
			<form class="create-kanban" action="create_kanban.php" method="GET">
				<input type="number" name="nb-col" min="2" placeholder="Number of columns">
				<input type="checkbox" name="access"> Public<br>
				<button type="submit" name="submit"> Set </button>
			</form>
			
			<?php
			
				if(isset($_GET['nb-col']) && !empty($_GET['nb-col'])){
					include 'includes/dbh.inc.php';
					//STEP 1 : CREATION OF A NEW KANBAN FILE 
							//sql statement for file's name : if first kanban ever => name : kanban_0.php
					$query = "SELECT MAX(id) AS max FROM kanbans"; 
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					if(empty($row['max'])){
						$filename = "kanban_".strval(0).".php";
					}else{
						$filename = "kanban_".strval($row['max']).".php";
					}
					
					$kanbanfile = $filename;
				
			
					echo 'This kanban board will be stored as the following file: '.$kanbanfile;
					echo '<br>';
					
					if(isset($_GET['access'])){
							$_SESSION['access'] = "true";
					}else{
							$_SESSION['access'] = "false";
					}
					
					if($_GET['nb-col'] == 2){
						fopen("kanbans/".$kanbanfile, "w+");
						echo 'The Kanban board will have 2 columns (standard kanban)<br>';
						$content = file_get_contents("standard_kanban.php");
						file_put_contents("kanbans/".$kanbanfile, $content);
						
						$uid = $_SESSION['u_uid'];
						$access = $_SESSION ['access'];
						$query = "INSERT INTO kanbans(owner, public, filename) VALUES ('$uid', '$access', '$kanbanfile')";
		
						/*echo 'uid = '.strval($uid).' & access = '.strval($access).'';*/
						if (!mysqli_query($conn, $query)){
							echo "Error";
						}else{
							header("Location: kanbans/".$kanbanfile."");
							exit();
						}
				
					}else{
						fopen("kanbans/".$kanbanfile, "w+");
					
						//STEP 2 : writing the head content of the kanban file
						$content = file_get_contents("kanbans/kanban_header.php");
						file_put_contents("kanbans/".$kanbanfile, $content);
						echo '<form action="create_columns.php" method="POST">';
			
						for($i = 2; $i < $_GET['nb-col']; $i++){
							echo '<input type="text" name="submit'. strval($i). '" placeholder="Title of column ">';
							echo '<br>';
						}
						echo '<input type="submit" name="send" value="send">' ;
						echo '</form>';
						echo '<br>';
						
						$_SESSION['nb'] = $_GET['nb-col'];
						
						$_SESSION['kanban'] = $kanbanfile;
					}
					
	
				}
			?>
			
		
		</div>

	</section>
