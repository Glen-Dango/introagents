<?php

include 'dbh.php';
include 'headercut.php';
echo "<br>";
?>

<?php
if(isset($_GET['edit']))  //'update'i sfound in the edit button code   edit changed to update
//if it is set to a value = isset
//if(isset($_GET['edit']))
//   https://www.youtube.com/watch?v=Hw1MwUlekeo&t=285s
{
    $id=$_GET['edit'];  

//selects all from users to populate the form , code in the form populates the fields. 
$res=mysqli_query($conn, "SELECT * FROM users where id=$id ");
   // company_id='".$_SESSION['company_id']."'
   $row= mysqli_fetch_array($res);  
//echo "<meta http-equiv='refresh' content='0'>";


}
// this posts the  info into the  database from the form. 

$error = false;

if(isset($_POST['id']))
{
$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$company = mysqli_real_escape_string($conn, $_POST['town']);    
$email = mysqli_real_escape_string($conn, $_POST['email']);

 if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$company)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }

   
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email structure";
    }


   if (!$error) {  

 // $sql = "UPDATE users SET name='$name', surname='$surname'   , email='$email' , password='$hashPassword' where id='$id'  ";

  if(mysqli_query($conn , "UPDATE users SET name='$name', surname='$surname'   , email='$email' 
     

    where id='$id'  ;"))

 {
            $successmsg = "Changes Successfully Made. <a href='user_admin.php'>Return To Users</a>";
        } else {
            $errormsg = "dublicate email...Please Contact Admin or Try Again.";
        }


}}


{
    $id=$_GET['edit'];  

//selects all from users to populate the form , code in the form populates the fields. 
$res=mysqli_query($conn, "SELECT * FROM users where id=$id ");
   // company_id='".$_SESSION['company_id']."'
   $row= mysqli_fetch_array($res);  
//echo "<meta http-equiv='refresh' content='0'>";


}



 
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
  <br>
  <div class="container-fluid col-sm10"><br>
 <!-- <h1>Listalot...</h1><br>    -->
  <h1 class="display-1">For the 
  UK's best .<br>
   
</h1>
<br>
  <br>
 <br>



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">

            <form role="form" action="" method="post" name="signupform">

                <fieldset>
                    <legend>Edit User</legend>


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
                  
                  <div class="col-xs-12"><br>
                        <label for="town">Location of Branch</label>
                        <input  type="text" name="town" value="<?php echo $row[4]; ?>" class="form-control" />
                        <span class="text-danger"></span>
                    </div>
      

                    <div class="form-group">
 

                    <div class="col-xs-12 "><br>
                        <label for="name">Email of User</label>
                        <input type="text" name="email" value="<?php echo $row[5]; ?>"  class="form-control" />
                        <span class="text-danger"></span>
                    </div>
 

               

                    <div class="form-group">
                     <div class="col-xs-6"><br>
                         <form action="" ><fieldset class="fieldset">
                        <button name="edit" id="edit" type="submit" 
                           class="btn btn btn-sm" value="<?php echo $row[0];?>">Update User</button>

                        
                    </div>
</div></div>
</div></div></div></fieldset></form>
                    
                     <div class="col-xs-6"><br>
                        <form action="pwd_change.php?edit=$row[id]" ><fieldset class="fieldset">
                        <button name="buy" id="" type="submit" 
                           class="btn btn btn-sm" value="<?php echo $row[0];?>">Change Password</button>

                    </div></fieldset></form>


 <div class="form-group">
    
    <div class="col-xs-12"><br>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
   

<br>
<br>
 
</div></fieldset></form>

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