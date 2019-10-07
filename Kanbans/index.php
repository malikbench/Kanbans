<?php

	session_start();

?>

<?php
require 'header.php';
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>Home</h2>
			<?php
				if(isset($_SESSION['u_id'])){
					echo "You are logged in!";
					echo '<br>';
					echo "You can now :";
					echo '
						<ul>
							<br/>
							<li><a href="create_kanban.php"> Create a new Kanban</a></li>
							<br/>
							<li><a href="owner_private_kanbans.php">Access your private kanban boards </a> </li>
							<br/>
							<li> Access your assigned tasks </li>
							<br/>
							<li><a href="owner_kanbans.php">Access the kanban boards you manage</a>  </li>
						
						</ul>
					';
				}
			?>
			
		</div>

	</section>
		
</body>
</html>

