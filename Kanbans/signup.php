<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>

		<header>
			<nav>
				<div class="main-wrapper">
					<ul>
						<li><a href="index.php"> Home </a></li>
					</ul>
					<div class="nav-login">
						<form>
							<input type="text" name="uid" placeholder="Username/email">
							<input type="password" name="pwd" placeholder="Password">
							<button type="submit" name="submit"> Login</button>
						</form>
						<a href="signup.php"> Sign up</a>
					</div>
				</div>
			</nav>
		</header>
		
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Sign up</h2>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<input type="text" name="first" placeholder="First name">
				<input type="text" name="last" placeholder="Last name">
				<input type="text" name="email" placeholder="EMail">
				<input type="text" name="uid" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" name="submit"> Sign up </button>
			</form>
			
		</div>

	</section>
		
</body>
</html>
