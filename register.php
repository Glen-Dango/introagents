
<?php

//php.ini  file if have issues on a live server - session.save_path = C:WINDOWSTEMP must be set up right.

//http://www.kodingmadesimple.com/2016/01/php-login-and-registration-script-with-mysql-example.html

//index.php   register.php  login.php  logout.php  session is in headercut.php

//good code for emailing user confirmation as this confirms they have given a correct email address:   https://www.sitepoint.com/users-php-sessions-mysql/


// i think cos email is unique this stop dublicate emails being put in database

include 'dbh.php';
    include 'headercut.php';
//echo "Connected successfully<br>";
echo "<br>";


?>

<?php

if (isset($_SESSION['company_id']));


// check if username is admin '1'  not admin = '0'
if($_SESSION['level'] !== '1'){
    // isn't admin, redirect them to a different page
    header("Location: http://localhost/LISTALOT1/firsts_dashboard.php");
}

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    

    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    
    $company_id = mysqli_real_escape_string($conn, $_POST['company_id']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    

    // this hashes password
    $options = array("cost"=>4);
     $hashPassword = password_hash($password,PASSWORD_DEFAULT,$options);


    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$branch)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

   
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email structure";
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

        

             if(mysqli_query($conn, "INSERT INTO users(name,surname,branch, email,password, company_id, level) VALUES('" . $name . "','" . $surname . "',  '" . $branch . "',   '" . $email . "', '" .$hashPassword . "'  , $company_id, $level     );"    ))


        {
            $successmsg = "You Successfully Registered! <a href='user_admin.php'>See All Users</a>";
        } else {
            $errormsg = "dublicate email...Please Contact Admin or Try Again.";
        }
    }
}


?>



<!DOCTYPE html>
<html>
<head>
    <title> Register.php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    
    
    
<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    
    <!--1 Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



    
    
   
     <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   
</head>  

<body>




<style type="text/css">
  h1 {margin-left: -0.5em;  font-weight:bold; font-size: 400%;}
  h2 {text-align:center;}

.capitalise
{
text-transform: capitalize;

  </style>


  
  
   <div class="container"><br>
   <form id="initialSearch" action="firsts_dashboard.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="" value="For sale">Back</button>
      <div class="pos-rel">
       
   
</div></fieldset></form>
  
  
  
  <div class="container-fluid col-sm12"><br>
  
  <h1 class="display-1">Add A User Here:<br>
   
</h1>
</div>
  <br>




<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">

            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>"  action="user_admin.php"    method="post" name="signupform">
                <fieldset>
                    <legend>Create User</legend>

                    <div class="form-group">
                    
                    <div class="col-xs-6">
                        <label for="name">First Name</label>
                        <input type="text" name="name" placeholder="First Name"  class="capitalise form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>


                  <div class="form-group">
                  
                  <div class="col-xs-6">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" placeholder="Surname" required value="<?php if($error) echo $surname; ?>" class="capitalise form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

        <div class="form-group">

       



<?php
$res=mysqli_query($conn, "SELECT * FROM company WHERE company_id='".$_SESSION['company_id']."' "); //where the id = the $id from the previos page select this info.  

    //where id gets each seperate row in table required
    $row= mysqli_fetch_array($res);   


?>

                     

                    <div class="col-xs-12"><br>
                        <label for="company">Your Company Name</label>
                        <input type="text" name="company" value="<?php echo $row[1]; ?>" readonly="readonly" 
                        required value="<?php if($error) echo $company; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>






                  <div class="form-group">
                  
                  <div class="col-xs-12"><br>
                        <label for="town">Town / City of Work</label>
                        <input  type="text" name="branch" placeholder="Users Branch" required value="<?php if($error) echo $branch; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>


                    
                 

                    <div class="form-group">
 

                    <div class="col-xs-12 "><br>
                        <label for="name">Email of New User</label>
                        <input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>


                    

                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <label for="name">Create Password</label>
                        <input type="password" name="password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    

                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>



                    <div class="form-group">
                     <div class="col-xs-6"><br>
                        <input type="submit" name="signup" value="Add User" class="btn -btn" />
                    </div>





 <?php
$res=mysqli_query($conn, "SELECT * FROM users WHERE company_id='".$_SESSION['company_id']."' "); 
    $row= mysqli_fetch_array($res);   
?>
                     <input type="hidden" name="company_id" value="<?php echo $row[7]; ?>"   >
                    <input type="hidden" name="level" value="0"    >





                </fieldset>
            </form>

            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
   



  



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>



<script src="http://code.jquery.com/jquery-3.2.0.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>





<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>





</body>
</html>
    




