<?php

session_start();

if(isset($_POST['submit'])){
	
	include 'dbh.inc.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//error handlers
	
	if(empty($uid) || empty($pwd)){
		
		header("Location: ../index.php?login=empty");
		exit();
	
	}else{
		
		$sql = "SELECT * FROM users WHERE uid = '$uid' OR email = '$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck < 1){
			
			header("Location: ../index.php?login=error");
			exit();
			
		}else{
			
			if($row = mysqli_fetch_assoc($result)){
				//dehashing of password
				$hashedPwdCheck = password_verify($pwd, $row['password']);
				if($hashedPwdCheck == false){
					header("Location: ../index.php?login=error");
					exit();
				}elseif($hashedPwdCheck == true){
					//log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_first'] = $row['first'];
					$_SESSION['u_last'] = $row['last'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_uid'] = $row['uid'];
					header("Location: ../index.php");
					exit();
					
				 }
			}
			
		}
	}
}else{
	header("Location: ../index.php?login=error");
	exit();
		
}
	

