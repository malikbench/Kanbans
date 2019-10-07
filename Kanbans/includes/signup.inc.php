<?php

/*test : if button has been clicked*/
if(isset($_POST['submit'])){
	
	include 'dbh.inc.php';
	
	/*security measure : prevent the insertion of code : if code written, converted to text*/
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	//error handlers
	//check for empty fields
	
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($password) ){
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ){
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			
			//check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=invalidemail");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE uid = '$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				//username already exists
				if($resultCheck > 0){
					header("Location: ../signup.php?signup=usernametaken");
					exit();
				} else {
					
					//password hash
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					
					//insert user in db
					$sql = "INSERT INTO users (first, last, email, uid, password) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
					$result = mysqli_query($conn, $sql);
					header("Location: ../index.php");
					exit();
					
				}
			}
		}
		
	}
	
} else {
	/*send back to sign up page*/
	header("Location: ../signup.php");
	exit();
}
