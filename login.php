<?php session_start(); ?> <!-- Start session -->
<!-- Checks if $_COOKIE "username is set, then set $_SESSION to true and redirect to dashboard.php" -->
<?php if(isset($_COOKIE["username"])) {

    $_SESSION["logged_in"] = true;
    
    header("Location: dashboard.php?login=true");
    
}
?>
<!doctype html>
<html lang="sv">
    <head>
       <!-- Metatags that must come first -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stylesheet.css">
        
        <!-- Fonter -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css">
        
        <title>Test</title>
    </head>
    <body>
        <header>
                <nav>
                    <ul>
                        <li><a href="#">Test1</a></li>
                        <li><a href="#">Test2</a></li>
                        <li><a href="#">Test3</a></li>
                        <li><a href="#">Test4</a></li>
                        <li><a href="#">Test5</a></li>
                    </ul>
                </nav>
        </header>
        <div class="flex-grid flex-heading-container">
                <div>
                    <h1>Test</h1>
                </div>
        </div>
        <main>
            <div class="flexbox-form-container">
                <div class="row flexbox-form">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="login.php" class="active" id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="register.php" id="">Register</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form"  method="post" role="form" action="logincheck.php">
                                            <div class="form-group epass">
                                                <label for="email">Email:</label>
                                                <input type="text" name="email" id="email" tabindex="1" placeholder="Email" value="" required>
                                            </div>
                                            <div class="form-group epass">
                                                <label for="login-password">Password:</label>
                                                <input type="password" name="password" id="login-password" tabindex="2" placeholder="Password" value="" required>
                                            </div>
                                            <div class="form-group text-center">
                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row flexbox-form-container">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- checks if $_GET logout is true then echos message to user -->
        <?php 
        if(isset($_GET["logout"]) && $_GET["logout"] == true) {
            echo "Du är nu utloggad!";
        }
        ?>
        <footer>
            <div class="flex-address">
                <h4>Tom</h4>
                <address>Tom</address>
            </div>
            <div>
                <nav>
                    <ul>
                        <li><a href="#">Tom</a></li>
                        <li><a href="#">Tom</a></li>
                        <li><a href="#">Tom</a></li>
                        <li><a href="#">Tom</a></li>
                    </ul>
                </nav>
            </div>
            <div class="flex-copyright">
                <p>&copy;opyright Tom 2016</p>
            </div>
        </footer>
        
    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    </body>
</html>



