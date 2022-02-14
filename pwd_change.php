<?php
include 'dbh.php';
include 'headercut.php';
echo "<br>";
?>


<?php

//echo "<td>      <a href='edit_user.php?edit=$row[id]'>Edit</a></td>    ";
// 'buy' is from  edit_user.php  :  value="<?php echo $row[0];>" in the 'change password" button'  $row[0] = the id of person i want to edit
if(isset($_GET['buy']))  

//   https://www.youtube.com/watch?v=Hw1MwUlekeo&t=285s
//{
   $id=$_GET['buy'];  

$res=mysqli_query($conn, "SELECT * FROM users where id=$id ");
   // company_id='".$_SESSION['company_id']."'
   $row= mysqli_fetch_array($res);  

$error = false;

if(isset($_POST['id']))
{
$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$password=mysqli_real_escape_string($conn, $_POST['password']);
$cpassword=mysqli_real_escape_string($conn, $_POST['cpassword']);

$options = array("cost"=>4);
     $hashPassword = password_hash($password,PASSWORD_DEFAULT,$options);

 if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
   
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {  

  if(mysqli_query($conn , "UPDATE users SET name='$name', surname='$surname' ,
    password='$hashPassword' where id='$id'  ;"))

 {
            $successmsg = "You Successfully Changed Password! <a href='user_admin.php'>Back To Users</a>";
        } else {
            $errormsg = "dublicate email...Please Contact Admin or Try Again.";
        }

}}
 
?>



<!DOCTYPE html>
<html>
<head>
    <title> Register.php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->

</head>
<body>

<style type="text/css">
  h1 {margin-left: 4.8em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:center;}
  </style>
  
  <div class="container-fluid col-sm12"><br>
  <h1>Listalot...</h1><br>
  <h1 class="display-1">For the 
  UK's best Estate Agents.<br>
   
</h1>

  <br>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="" method="post" name="signupform">
                <fieldset>
                    <legend>Change Password</legend>

                   <input type="hidden" name="id" value="<?php echo $row[0];    ?>">

                    <div class="form-group">                  
                    <div class="col-xs-6">
                        <label for="name">First Name</label>
                        <input type="text" name="name" value="<?php echo $row[2]; ?>"  class="form-control" />
                        <span class="text-danger"></span>
                    </div>


                  <div class="form-group">                
                  <div class="col-xs-6">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" value="<?php echo $row[3]; ?>"   class="form-control" />
                        <span class="text-danger"></span>
                    </div>

                     <div class="form-group">                
                  <div class="col-xs-6">
                        <label for="surname">Email</label>
                        <input type="text" name="surname" value="<?php echo $row[5]; ?>"   class="form-control" />
                        <span class="text-danger"></span>
                    </div>

 		<div class="form-group">

                 
<!--
                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <label for="name">Create Password</label>
                        <input type="password" name="password" value="<?php //echo $row[6]; ?>" required class="form-control" />
                        <span class="text-danger"></span>
                    </div>

                    

                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" value="<?php //echo $row[6]; ?>" required class="form-control" />
                        <span class="text-danger"></span>
                    </div>

-->
       <div class="form-group">
                     <div class="col-xs-6"><br>
                        <label for="name">Change Password</label>
                        <input type="password" name="password"     class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    

                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword"  class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>



                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <input type="submit" name="signup" value="Update User" class="btn btn" />
                    </div>



                </fieldset>
            </form>

            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
  
  

  
   <div class="container"><br>
   <form id="initialSearch" action="user_admin.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="" value="For sale">Back To Users</button>
      <div class="pos-rel">
       
   
</div></fieldset></form>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


<script src="http://code.jquery.com/jquery-3.2.0.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
