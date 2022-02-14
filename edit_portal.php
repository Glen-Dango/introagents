  <?php
  include 'dbh.php';
  include 'headercut.php';
  


  if(isset($_GET['update']))
    {      
  //   https://www.youtube.com/watch?v=Hw1MwUlekeo&t=285s
      $id=$_GET['update'];   
      $res=mysqli_query($conn,"SELECT * FROM applicant_card WHERE id=$id "); //where id gets each seperate row in table required
      //fetch array gets the info from the table so it can be displayed.  
      $row= mysqli_fetch_array($res);
  }


  {
  if(isset($_GET['update']))
     // nothing is in portal table at first but after updating info it turns into an edit form.      
  //   https://www.youtube.com/watch?v=Hw1MwUlekeo&t=285s

      $id=$_GET['update'];   
      $res=mysqli_query($conn,"SELECT * FROM portal WHERE id=$id ");   
      $ron= mysqli_fetch_array($res);

  //price, pricetext, fee, description, url
      
  }


  ?>


  <!DOCTYPE html>
    <html lang="en">
      <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="icon" href="../../favicon.ico">

        <title>edit_portal.php</title>

          <!-- bootstrap 3 -->
      <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">  
      <link rel="stylesheet" href="css/bootstrap.min.css">  
      <link rel="stylesheet" type="text/css" href="stylesheet.css"> 

     

    <!-- Jquery UI this adds styling and boxes etc  to the UI-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-3.2.0.js"></script>
    <!--jquery ui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <!-- If cdn above fails to load this will take its place below so never lose connection -->
    <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>');</script> 



  <!-- modal one   -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    


  <!--include file for css file -->
   <link rel="stylesheet" type="text/css" href="portal.css"> 

  </head>

   <body>




  <div class="container">
  <form  action="edit_portal_code.php" method="POST"   class="well form-horizontal"  enctype="multipart/form-data"    >
  <fieldset>

  <!-- Form Name -->
  <legend >Upload Your New Instruction Here</legend>

  <div class="form-group">
  <label class="col-md-4 control-label">id</label> 
  <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
      
  <input type="text" name="id" value="<?php echo $row[0]; ?>">

  </div>
  </div>
  </div>


  <div class="form-group">
    <label class="col-md-4 control-label">Post Code</label>  
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">

          <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input style="cursor:pointer" name="postcode" value="<?php echo $row[8]; ?>" class="form-control"  type="text" onkeydown="upperCaseF(this)"/>
      </div>
  </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Area</label>  
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input style="cursor:pointer" name="area" value="<?php echo $row[10]; ?>" class="form-control" type="text"  onkeydown="upperCaseF(this)"/>
      </div>
    </div>
  </div>



   
  <div class="form-group">
    <label class="col-md-4 control-label">City</label>  
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <input style="cursor:pointer" name="city" value="<?php echo $row[11]; ?>" class="form-control"  type="text"   onkeydown="upperCaseF(this)"/>
      </div>
    </div>
  </div>




  <legend>The Important Stuff</legend>

     <div class="form-group">
    <label class="col-md-4 control-label">Price of Property</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-gbp"></i></span>
    <input style="cursor:pointer" name="price"  value="<?php echo $ron["price"]; ?>"   class="form-control"  type="text"      >
  </div>
  </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Price Text</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-gbp"></i></span>
    <input style="cursor:pointer" name="pricetext" placeholder="Offers Over, Auction etc" value="<?php echo $ron["pricetext"]; ?>"  class="form-control"  type="text"     >
  </div>
  </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Fee</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-gbp"></i></span>
    <input style="cursor:pointer" name="fee" placeholder="Fee £  inc the VAT" class="form-control" value="<?php echo $ron["fee"]; ?>" type="text"      >
  </div>
  </div>
  </div>

  <div class="form-group">

    <label class="col-md-4 control-label">Description</label> 

    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-bullhorn"></i></span>
    <textarea rows="3" style="cursor:pointer" 
     
    name="description"   class="form-control" type="text"    maxlength="240"  value="<?php echo $ron["description"]; ?>" ><?php echo $ron["description"];?></textarea>

                                     

  </div>
  </div>
  </div>

  <div class="form-group">

    <label class="col-md-4 control-label">Link to your Website</label> 

    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
    <textarea rows="3" style="cursor:pointer" 
     
    name="url"  class="form-control"  type="url"  value="<?php echo $ron["url"]; ?>" placeholder="Paste property Url from your website here for full details. (put a tooltip here how to paste)   "  value="<?php echo $ron["url"]; ?>" ><?php echo $ron["url"];?></textarea>
  </div>
  </div>
  </div>


        

   <legend></legend>

  <legend>Change your Images, here: </legend>


  <div class="form-group">
  <label class="col-md-4 control-label">Photo 1</label> 
   
     <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon" ><i class=" glyphicon glyphicon-camera pink  "></i></span> 
  <form id="form1" runat="server" >

       <input type='file' id="imgInp1" name="file"  /> 
       

  <?php

  if(isset($_GET['update']))

    $id=$_GET['update'];

  //$res=mysqli_query($conn,"SELECT file FROM portal_images  where id=$id ");  // and file='main'
  $res=mysqli_query($conn,"SELECT * FROM portal_images  where id=$id and position = 'first'  ");
  //while($rob= mysqli_fetch_array($res)){
    $rob= mysqli_fetch_assoc($res)

   
  ?>
   


      <img src="<?php echo 'images/'.$rob['file'];?>"  id="blah1" id="#" alt="Change Image by Clicking Browse " width="247" height="142" />


   <?php

      

   ?>


    
  </div></div></div>



  <div class="form-group">
  <label class="col-md-4 control-label">Photo 2</label> 
   
     <div class="col-md-4 inputGroupContainer">
  <div class="input-group" >
  <span class="input-group-addon"><i class="glyphicon glyphicon-camera pink"></i></span> 
  <form id="form2" runat="server"   >

       <input name="file2" type='file' id="imgInp2"   />  

   <?php

  if(isset($_GET['update']))

    $id=$_GET['update'];

  //$res=mysqli_query($conn,"SELECT file FROM portal_images  where id=$id ");  // and file='main'
  $res=mysqli_query($conn,"SELECT * FROM portal_images  where id=$id and position = 'second'  "); 

  //while($rob= mysqli_fetch_array($res)){
    $rob= mysqli_fetch_assoc($res)

   //while($rob= mysqli_fetch_assoc($res))



  ?>


      <img src="<?php echo 'images/'.$rob['file'];?>" id="blah2" id="#" alt="Change Image by Clicking Browse " width="247" height="142"/>

   <?php



  ?>
  </div></div></div>
   




  <div class="form-group">
  <label class="col-md-4 control-label">Photo 3</label> 
   
     <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i  class="glyphicon glyphicon-camera pink"></i></span> 
  <form id="form3" runat="server"  >

        <input type='file' id="imgInp3" name="file3"  />    

  <?php

  if(isset($_GET['update']))

    $id=$_GET['update'];

  //$res=mysqli_query($conn,"SELECT file FROM portal_images  where id=$id ");  // and file='main'
  $res=mysqli_query($conn,"SELECT * FROM portal_images  where id=$id and position = 'third'  "); 

  //while($rob= mysqli_fetch_array($res)){
    $rob= mysqli_fetch_assoc($res)

   //while($rob= mysqli_fetch_assoc($res))



  ?>





      <img src="<?php echo 'images/'.$rob['file'];?>"  id="blah3" id="#" alt="Change Image by Clicking Browse " width="247" height="142"/>


  </div></div></div>


     
  <br>
   <legend>


  <div class="form-group">
    <label class="col-md-4 control-label "></label>
    <div class="col-md-4">
      <button name="submit" type="submit" class="btn btn-primary active" >Edit Your Property <span class="btn btn-info"></span></button>
    </div>
  </div>
  </form>


  <legend></legend>


  </fieldset>
  </form>
  </div>



  <br><br><br><br><br><br> 






  </body>

  </html>


  <script>
  function readURL(input, imgID) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $(imgID).attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#imgInp1" ).change(function(){
          readURL(this, "#blah1");
      });

        $("#imgInp2" ).change(function(){
          readURL(this, "#blah2");
      });

         $("#imgInp3" ).change(function(){
          readURL(this, "#blah3");
      });

  </script>
  <script type="text/javascript">
  $("#submitForm").on('click', function() {
          $("#contact_form").submit();
      });
  </script>

  <script src="ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  <!-- modal cdns -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
