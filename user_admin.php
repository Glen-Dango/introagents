




<!DOCTYPE html>
  <html lang="en">
    <head>


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="icon" href="../../favicon.ico">

      <title>user_admin.php</title>

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


    ///DataTables cnn
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  
///Datatables java
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>


      <!-- Bootstrap core CSS -->
      
    </head>
    <body>
  <?php 
    include 'dbh.php';
    include 'headercut.php';
  
?>
<br><br>
<style type="text/css">
  h1 {margin-left: 4.8em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:center;}
  </style>
  
  <div class="container-fluid col-sm12"><br>
  <h1>Your Users...</h1><br><br>
  
   
</h1>

  <br>


<div class="container">
<form  action="" method="POST" class="well form-horizontal">
<fieldset>

<!-- Form Name -->
<legend >User Details</legend>


    <table class="table table-striped table-bordered  table-hover"  id="example" class="display" cellspacing="0" > <!--, table table-inverse-->

      <thead >
        <tr > 
              
          <th>Name</th>
          <th>Surname</th>
          <th>Branch</th>
          <!--<th>Email</th>-->
              <th>Email </th>
     
              <th>Edit</th>
                              
        </tr> 
 </thead>


 <tbody>


<?php


$res=mysqli_query($conn, "SELECT * FROM users WHERE company_id='".$_SESSION['company_id']."' ");
   
    while($row= mysqli_fetch_array($res))  { 
      
       echo "<tr>";
  //echo "<td> " . $row["id"]."</td>";
        echo "<td> " . $row["name"]."</td>";
        echo "<td> " . $row["surname"]."</td>";
         echo "<td> " . $row["branch"]."</td>";
         echo "<td> " . $row["email"]."</td>";
       
     //   echo "<td> " . $row["password"]."</td>";
     
    echo "<td>      <a href='edit_user.php?edit=$row[id]'>Edit</a></td>    ";
         echo "</tr>";
       }




 //<input type="button" name="Edit" value="view" />  echo" <td>" id=  echo $row["id"]; class="btn btn-info btn-xs edit_data"  "</td>"};

?>



</tbody>
 </table> 





<script>   // this changes drop down amounts in table .
$(document).ready(function(){
    $('#example').DataTable();
});
</script>





<script src="ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  </body>
</html>