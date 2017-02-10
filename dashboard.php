<?php  session_start(); ?> <!-- starts session -->

<a href="logout.php">Log Out</a>


<?php

// checks if $_SESSION logged_in has the value of true, then echoes the $_SESSIONS username value, echoes the $_SESSION userpic to show the users picture

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    
    echo "<h1>Welcome " . $_SESSION["username"] . "</h1>";
    
    echo "<img src='".$_SESSION["userpic"]."' alt='Profilepic on ".$_SESSION["username"]."'>";
    ?>
    <a href="filuppladning.php">Change profilepic</a>
    <?php
}


?>