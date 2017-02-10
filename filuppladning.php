<?php session_start(); ?> <!-- starts session -->


<form method="post" enctype="multipart/form-data">
    <input type="file" name="profile_pic">
    <input type="submit" name="upload" value="Uppload pic">
</form>

<a href="dashboard.php">Dashboard</a>
<br>


<?php 
// if-statement which checks if $_SESSION logged_in is true, shows users pic($_SESSION userpic)

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    ?>
    Your current profilepic:
    <img src="<?php echo $_SESSION["userpic"]; ?>">
    <?php
}

// if statement which checks if $_POST value upload exists

if(isset($_POST["upload"])) {
    
    
    $userid =$_SESSION["userid"]; // sets $userid to $_SESSION userid value
    
    echo "<p>You are logged in as " . $_SESSION['username'] . "</p>";// echoes $_SESSION username value
    
    $target_folder = "userpics/";// sets targetfolder for upload
    $target_name = $target_folder . basename("user-".$userid.".jpg");// sets name on picture uploaded using userid
    
    // if statement wich checks filesize on picture
    if($_FILES["profile_pic"]["size"] > 10000000) {
        echo "Filesize is to big";
        exit;
    }
    
    // Moves the file to the userpicfolder
    if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_name)) {
        echo "OK!";// echoes a ok message
    
        $conn = new mysqli("dynwebinl2-219674.mysql.binero.se", "219674_rw69396", "*Nomel*2016", "219674-dynwebinl2");// connection to database
        
        $query = "UPDATE users SET userpic_url = '{$target_name}' WHERE id = '{$userid}'";// sql query to the database
        
        $stmt = $conn->stmt_init();//initialize a statement to be used with prepare
        
         // if-statement which checks upload of pic. Prepare checks if sql question is in the right way,execute runs question to database echoes a message
        
        if($stmt->prepare($query)) {
            $stmt->execute();
            echo "Profilepic updated.";
            $_SESSION["userpic"] = $target_name;
        } else {
            echo mysqli_error();// shows mysqli error message
        }
        
    } else {
        echo "Error somethingh whent wrong!"; //Shows error message
    }
    
}

?>