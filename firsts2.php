
<?php
//kept this code on the page so that the client_name input field workks,,otherwise rest of code on firsts_dashboard

if(isset($_SESSION['usr_id'])) 
{
   // header("Location: firstconfirm.php.php");
}

include 'dbh.php';
  include 'headercut.php';

//set validation error flag as false
$error = false;
if (isset($_POST['submit'])) {

//goes to listalot db phpmyadmin 
$usr_id = $_SESSION['usr_id'];
$client_title =mysqli_real_escape_string($conn, $_POST['client_title']);
$client_name =mysqli_real_escape_string($conn, $_POST['client_name']);
$client_contact =preg_replace('/[^0-9]/', '', $_POST['client_contact']);
$client_email =mysqli_real_escape_string($conn, $_POST['client_email']);
$notes=addslashes('notes');

$advisor =$_POST['advisor'];
$sources =$_POST['sources'];

// only works if post to same page
 //if (!preg_match("/^[a-zA-Z ]+$/",$client_name)) {
 //     $error = true;
  //   echo  $name_error = "Name must contain only alphabets and space";
  // }

 if (!$error) {  //md5($password) creates # long password into database for now use normal passwords . 
        if(mysqli_query($conn, "INSERT INTO firsts(usr_id, client_title, client_name, client_contact, client_email, notes , advisor, status, sources) VALUES('" . $usr_id . "','" . $client_title . "',  '" . $client_name . "', '" . $client_contact . "', '" .$client_email . "',  '" . $notes . "'  ,  '" . $advisor . "', '" . $status . "', '" . $sources . "' 
          )"  )) 


        {
            $successmsg = "You Successfully Registered A First! <a href='firsts_dashboard.php'>Click here to see your results.</a>";
        } else {
            $errormsg = "You entered an email that already exisits...Please try again.";
        }
    }

}


?>

<!DOCTYPE HTML>
<html lang="en">
 <meta charset="UTF-8" />   

<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>firsts2.php</title>
  

   <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>



</head> 


<style type="text/css">
  h1 {margin-left: 4.8em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:center;}
  </style>
  <br>
  <div class="container-fluid col-sm-12"><br>
  <h1>Make An Intro..</h1><br><br><br>
</style>

<style>

.capitalise
{
text-transform: capitalize;

}

body 

 {
	
    <!-- backgroun: #E0E0E0; 

}

{ 
  padding-top: 70px;
}
</style>


<body>
 

<div class="container">

    <form  id="contact" action="firstconfirm.php" method="POST" class="well form-horizontal"> 


<fieldset>

<!-- Form Name -->
<legend style="float:top" >Enter your mortgage lead here . </legend>


<input type="hidden" name="status" value="0">
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">

  <span class="input-group-addon"><i class="glyphicon glyphicon-king"></i></span>
  <select name="client_title" class="form-control selectpicker" >
      <option value=" " >Mr / Mrs / Miss / Ms / Dr </option>
      <option>Mr</option>
      <option>Mr and Mrs</option>
      <option>Miss</option>
<option>Ms</option>
<option>Dr</option>
    </select>
    </div>
  </div>
</div>  




  <div class="form-group">
  <label class="col-md-4 control-label">Clients Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 

  <input style="cursor:pointer "   id="client_name" name="client_name" placeholder="Name"  required value="<?php if($error) echo $client_name; ?>"  class="capitalise form-control"  type="text" 
   
>
  </div>
</div>
</div>




<style>
input[required] {
  outline: #ff69b4;
}
</style>

<div class="form-group">
  <label class="col-md-4 control-label" >Clients Phone</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

  <input style="cursor:pointer" name="client_contact" type="text" required  placeholder="Best Phone Number" class="form-control"  >
  
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Clients E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input style="cursor:pointer" name="client_email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label">Notes To Assist Your Mortgage Advisor</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea style="cursor:pointer" class="form-control" type="text" name="notes" placeholder="Onward Purchase Price etc: "></textarea>



  </div>
  </div>
</div>




<div class="form-group">
  <label class="col-md-4 control-label">Mortgage Advisor</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-king"></i></span>

  <select required type="text" name="advisor" class="form-control selectpicker" >

    <!-- <option >Your Advisor</option>   -->
<option>Intro Advisor</option>
<option>your Advisor</option>
</select>
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Lead Source</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-king"></i></span>

    <select required type="text" name="sources" class="form-control selectpicker" >

  <option value="0">Web Lead</option>
      <option value="1">Self Generated</option>


    </select>

    </div>
  </div>
</div>

 






<div class="form-group">
  <label class="col-md-4 control-label">Permission</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  
 <input type="checkbox" name="permission"  value="Permission"  required> Your client has agreed to be contacted, to discuss mortgage requirements, in accordance with GDPR guidelines.  </input>
</div>
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label "></label>
  <div class="col-md-4">
    <button type="submit" name="submit" class="btn btn" >Submit <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>



</fieldset>
</form>


<br>

     <form id="initialSearch" action="firsts_dashboard.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="" value="For sale">Back</button>
      <div class="pos-rel">
       
    </div>
</div></fieldset></form>




 <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>


<!-- this is an include file for ui.js the src is a file in listalot1  -->
      <script src="ui.js"></script>
</div>
    </div><!-- /.container -->




    
<script>
  $(document).ready(function(){

 

  });
  </script>



 
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


  </body>
</html>

