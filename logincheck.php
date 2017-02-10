<?php session_start();// starts session

if(isset($_POST["login-submit"])) { // checks if $_POST has value, submitted.

	if( !empty($_POST["email"]) && !empty($_POST["password"]) ) { // if email and password is not empty.

		$conn = new mysqli("localhost", "root", "root", "dynweb_inl2"); // connection to database.

		$email = mysqli_real_escape_string($conn, $_POST["email"]);// sets variabel $email to the value from $_POST email(users input in email field) after escaping special characters.
		$password = mysqli_real_escape_string($conn, $_POST["password"]);// sets variabel $password to the value from $_POST password(users input in password field) after escaping special characters.

		$stmt = $conn->stmt_init(); //initialize a statement to be used with prepare  

        // if-statement which checks login. Prepare checks if sql question is in the right way. 
        
		if($stmt->prepare("
			SELECT * FROM users
			WHERE email = '{$email}'
			")) {
			$stmt->execute();// execute runs question to database 

			$stmt->bind_result($id, $un, $up, $ue, $uf, $ul, $uu); // saves the result into variables
			$stmt->fetch();// fetch the result into the bound variables.

            $result = password_verify($password, $up); // uses password_verify to check hashed password
            
			if($id != 0 && $up == $result) { // checks if userid is not 0 and that password is valid.

				setcookie("username", $un, time() + (3600 * 8));// sets a cookie named username with value $un and to expire in 8hrs
                
                $_SESSION["logged_in"] = true;//sets session logged_in to true
                $_SESSION["username"] = $un;//sets session username to true
                $_SESSION["userid"] = $id;//sets session userid to true
                $_SESSION["userpic"] = $uu;//sets session userpic to true
                $_SESSION["email"] = $ue;//sets session email to true
                
                header("Location: dashboard.php?login=true"); // redirect to dashboard
                
                

			} else {
				//echo "Finns inte.";
                header("Location: login.php?login=false");// redirict to login if login fails
			}

		}

	}

}

?>