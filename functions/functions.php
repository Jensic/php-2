<?php


/**************************************************
                HELPER FUNCTIONS
***************************************************/

/**
*
*A function to check if email is already registred, it takes in the $email variable. $sql variable stores the sql question. $sql is sended to the query function(in db.php) and result is stored in the $result variable. Then $result variable is sended into row_count function(in db.php) using an if-statement. If the result comes back equal to 1 it returns true(email exist) otherwise it returns false(email does not exist).
*
*
**/

function email_exists($email) {
    
    $sql = "SELECT id FROM users WHERE email = '$email'";
    
    $result = query($sql);
    
    if(row_count($result) == 1) {
        
        return true;
        
    } else {
        
        return false;
        
    }
    
}

/**
*
*A function to check if username is already registred, it takes in the $username variable. $sql variable stores the sql question. $sql is sended to the query function(in db.php) and result is stored in the $result variable. Then $result variable is sended into row_count function(in db.php) using an if-statement. If the result comes back equal to 1 it returns true(username exist) otherwise it returns false(username does not exist).
*
*
**/

function username_exists($username) {
    
    $sql = "SELECT id FROM users WHERE username = '$username'";
    
    $result = query($sql);
    
    if(row_count($result) == 1) {
        
        return true;
        
    } else {
        
        return false;
        
    }
    
}

/**************************************************
               VALIDATION FUNCTIONS
***************************************************/

/**
*
*A function that checks if $_POST with value register_submit exists, then checks if $_POST username and password is not empty, strip_tags is used to strip html and php tags, then the input forms values are stored in variables $username and so on.Then checks if username or email exists in database. Also checks if password and password confirm matches. If it passes those checks, the fucntion register_users is used to register the values into the database. strip_tags is used to strip html and php tags.
*
*
**/

function validate_user_registration() {
    
    
    if(isset($_POST["register-submit"]) ) {
        
        if( !empty($_POST["username"]) && !empty($_POST["password"]) ) {
            
            $username           = strip_tags($_POST['username']);
            $password           = strip_tags($_POST['password']);
            $email              = strip_tags($_POST['email']);
            $firstname          = strip_tags($_POST['first_name']);
            $lastname           = strip_tags($_POST['last_name']);
            $confirm_password   = strip_tags($_POST['confirm_password']);

            if(username_exists($username)) {
                echo "Sorry that username is already taken";
            }

            if(email_exists($email)) {
                echo "Sorry that email already is registred";
            }

            if ($password !== $confirm_password) {

                echo "Your password fields do not match";

            }

            if(register_user($username, $password, $email, $firstname, $lastname)) {

                    

                    echo "user registred";

                } else {

                    echo "user not registred";

                    

                }

            }
    }
    
} 

/**************************************************
               REGISTER USER  FUNCTIONS
***************************************************/

/**
*
*Function wich takes the values from validate_user_registration and first escape(db.php) special characters, then uses the functions email_exist and username_exists from db.php to check if email and username exists. If it passes those checks the password is hashed and the information is inserted into database and sends back true (or false) to validate_user_registration
*
*
**/

function register_user($username, $password, $email, $firstname, $lastname) {
    
    $username   = escape($username);
    $password   = escape($password);
    $email      = escape($email);
    $firstname  = escape($firstname);
    $lastname   = escape($lastname);
    
    if(email_exists($email)) {
        
        return false;
        
    } else if (username_exists($username)) {
        
        return false;
        
    } else {
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users(username, password, email, firstname, lastname)";
        $sql.= " VALUES('$username', '$password', '$email', '$firstname', '$lastname')";
        $result = query($sql);
        
        return true;
        
    } 
    
} 

















