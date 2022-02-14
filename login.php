<?php
include 'dbh.php';
?>

<?php

//WARNING:   LOG IN ON LIVE APP DOESNT WORK UNLESS A CRYPTED PASSWORD IS USED>>I>E> I GO INTO DATABASE AND CREATE A USER WITH MY PASSWORD UNTIL EDITD.


//register.php  =   gets a new user into the db .  companies are put in by hand. 

//http://www.kodingmadesimple.com/2016/01/php-login-and-registration-script-with-mysql-example.html

//if(isset($_SESSION['usr_id'])!="") {
 //   header("Location: firsts_dashboard.php");
//}


//check if form is submitted   md5($password)  -   put this on when use secure # passwords
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

  //  $result =  "SELECT * FROM users WHERE email = '" .$email. "' ";
$rs = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' ");

//$rs = mysqli_query($conn,$result);
    $numRows = mysqli_num_rows($rs);
    

    //if password doesnt match then once go to else statement
    if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['password'])){


       
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
       $_SESSION['company_id'] = $row['company_id'];
       $_SESSION['level'] = $row['level'];
        $_SESSION['email'] = $row['email'];

        header("Location: firsts_dashboard");
    } else {
        $errormsg = "Incorrect or Duplicate Email or Password!!!";
    
}}
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>login.php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >


    <link rel="icon" href="C:\wamp64\www\listalot1\images\14946-1wedd">

    <link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->

<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
  
    <!--1 Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!--2 Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!--3 Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top ">


    <div class="container">   <!--  -fluid spreads out the text -->
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/wordpress">IntroAgents</a>
        </div>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
               
                <li class="active"><a href="http://localhost/wordpress" style="color: #ff69b4">Home</a></li>
            </ul>
        </div>
    </div>
</nav>







<style type="text/css">
  h1 {margin-left: 4.8em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:center;}
  </style>




  <br><br><br>
  <div class="container-fluid col-sm-12"><br>
  <h1>IntroAgents!</h1><br>
  <h1 class="display-1">For the 
  UK's best Estate Agents.<br><br>
   

  </h1>


  <h2>Who can you help today? </h2>





<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Log-In</legend>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn -btn" />
                    </div>
                </fieldset>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        Not A Member? <a href="http://localhost/wordpress/#contact-1" style="color: #ff69b4">Contact Us</a>
        </div>
    </div>
</div>


</body>
</html>