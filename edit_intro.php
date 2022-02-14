 <?php 
    include 'dbh.php';
   include 'headercut.php';
  
?>
<?php

if(isset($_GET['edit']))  //Get info is triggered by the 'edit'  code   on firstsleadbook.php
//if it is set to a value = isset

//   https://www.youtube.com/watch?v=Hw1MwUlekeo&t=285s
{
    $id=$_GET['edit'];  

$res=mysqli_query($conn, "SELECT * FROM firsts where numbers=$id ");
   // company_id='".$_SESSION['company_id']."'
   $row= mysqli_fetch_array($res);  


}

?>



 <!DOCTYPE html>
  <html lang="en">
    <head>


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Latest compiled and minified CSS -->
 <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="stylesheet.css"> 

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->

  <!-- Jquery UI this adds styling and boxes etc  to the UI-->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-3.2.0.js"></script>
  <!--jquery ui -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
  <!-- If cdn above fails to load this will take its place below so never lose connection -->
  <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>');</script> 


<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($) {
    $("#client_name").keyup(function(event) {
        var textBox = event.target;
        var start = textBox.selectionStart;
        var end = textBox.selectionEnd;
        textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1).toLowerCase();
        textBox.setSelectionRange(start, end);
    });
});
</script>

      
      <link rel="icon" href="../../favicon.ico">

      <title>edit_intro.php</title>

    </head>

<style type="text/css">
  h1 {margin-left: 4.2em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:center;}
  </style>
  <br>
  <div class="container-fluid col-sm-12"><br>
  <h1>Edit An Intro..</h1><br><br><br>
</style>


    <body>
 

<div class="container">

    <form  id="contact" action="firstsleadbook.php" method="POST" class="well form-horizontal">
  
<fieldset>

<!-- Form Name -->
<legend style="float:top" >Edit your mortgage lead here . </legend>

<input type="hidden" name="numbers" value="<?php echo $row[0];  ?>">
 <input type="hidden" name="usr_id" value="<?php echo $row[1];  ?>">

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">

  <span class="input-group-addon"><i class="glyphicon glyphicon-king"></i></span>
  
    <select name="client_title" value="<?php echo $row[3];  ?>" class="form-control selectpicker" >
     <option  ><?php echo $row[3];  ?> </option>

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
  <label class="col-md-4 control-label">Clients Surname</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 

  <input style="cursor:pointer "   id="client_name" name="client_name"    class="form-control"  type="text"  value="<?php echo $row[4]; ?>"   >
   <!-- required value="<?php if($error) echo $client_name; ?>"  -->

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

  <input style="cursor:pointer" name="client_contact"  value="<?php echo $row[5];  ?>"   required ="pink"  class="form-control"  type="tel">
  
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Clients E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input style="cursor:pointer" name="client_email" value="<?php echo $row[6];  ?>" class="form-control"  type="text">
    </div>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label">Notes To Assist Your Mortgage Advisor</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea style="cursor:pointer" class="form-control" type="text" name="notes" ><?php echo $row[7];  ?> </textarea>



  </div>
  </div>
</div>




<div class="form-group">
  <label class="col-md-4 control-label">Mortgage Advisor</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-king"></i></span>

  <select required type="text" name="advisor" class="form-control selectpicker" >

<option  ><?php echo $row[8];  ?> </option>

   
<option >Your Advisor</option>
<option >Intro Advisor</option></select>
    </div>
  </div>
</div>






<div class="form-group">
  <label class="col-md-4 control-label">Lead Source</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-king"></i></span>

    <select required type="text" name="sources" class="form-control selectpicker" >


<option value= <?php echo $row[10]; ?>> <?php if ($row[10] == 1) {    
    echo "Self Generated";    
} else if ($setup == 0) {    
    echo "Web Lead";    
}  ?> </option>

<!--  if ($row[10] == 0) { echo "web"; } else { echo "self gen"; }

echo $row[10]; 

-->
  <option value="0">Web Lead</option>
      <option value="1">Self Generated</option>


    </select>

    </div>
  </div>
</div>








<div class="form-group">
  <label class="col-md-4 control-label">Client Status</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <input type="checkbox" checked name="status" required value="0"  > Passed Over</input>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
 <input type="checkbox" name="status"  value="1"  

 <?php echo ($row[9]==1 ? 'checked' : '');?>> Signed Up</input> 


</div>
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <form action="" method="get">
  <label class="col-md-4 control-label "></label>
  <div class="col-md-4">
    <button   type="submit" name="submit" class="btn btn" >Submit <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>



</fieldset>
</form>


<br>

     <form id="initialSearch" action="firstsleadbook.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="" value="For sale">Back</button>
      <div class="pos-rel">
       
    </div>
</div></fieldset></form>





 <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>


<!-- this is an include file for ui.js the src is a file in listalot1  -->
      <script src="ui.js"></script>
</div>
    </div><!-- /.container -->





<?php include 'footer.php'; ?>


