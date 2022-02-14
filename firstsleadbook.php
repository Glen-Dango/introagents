<?php 
 include 'dbh.php';
 include 'headercut.php';
  
?>   

<?php

if(isset($_POST['usr_id']))
{
 $numbers = mysqli_real_escape_string($conn, $_POST['numbers']);
$id = mysqli_real_escape_string($conn, $_POST['usr_id']);
 $client_title = mysqli_real_escape_string($conn, $_POST['client_title']);
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
   // $company = mysqli_real_escape_string($conn, $_POST['town']);
    $client_contact = mysqli_real_escape_string($conn, $_POST['client_contact']);
   $client_email = mysqli_real_escape_string($conn, $_POST['client_email']);
    $notes = mysqli_real_escape_string($conn, $_POST['notes']);
    $advisor = mysqli_real_escape_string($conn, $_POST['advisor']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$sources = mysqli_real_escape_string($conn, $_POST['sources']);
$client_name=ucwords($client_name);

  $sql = "UPDATE firsts SET client_title='$client_title', client_name='$client_name'   , client_contact='$client_contact' , client_email='$client_email' ,notes='$notes', advisor='$advisor' , status=$status , sources=$sources where numbers='$numbers'  ";


    $res     = mysqli_query($conn, $sql) or die("Could not do it, ".mysqli_error($conn));

}


?>


    <!DOCTYPE html>
  <html lang="en">
    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    
      <title>firstsleadbook</title>


<!-- bootstrap theme i.e. makes it work and look good   i.e the css stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->
  <!-- Jquery UI this adds styling and boxes etc  to the UI-->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> 
  <!--jquery ui -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
  <!-- If cdn above fails to load this will take its place below so never lose connection -->
  <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>');</script> 
  <!--DataTables cnn  -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css"> 
<!--DataTables java  -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>



<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js" type="text/javascript"></script>



<!--

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

-->




    </head>
    <body>
  

<style type="text/css">
  h1 {margin-left: 4.1em;  font-weight:bold; font-size: 550%;}
  h2 {margin-left: 12.1em;  }
  </style>
  <br>

  <div class="container col-xs-12">
  <h1>Firsts-Book</h1>
  
<br><br></div>

<br><br><br><br>
<div class="container">
<div class="row">
<div class="col-xs-3">
      <form id="initialSearch" action="firsts2.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Refer A Client</button>
      <div class="pos-rel">
       
  
</div></fieldset></form></div>


<div class="container">
<div class="row">
<div class="col-xs-3">


<form id="initialSearch" action="firsts_dashboard.php" method="get"><fieldset class="fieldset">
  <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Firsts Dashboard</button>
      <div class="pos-rel">
       
   
</div></fieldset></form></div>


<div class="container">
<div class="row">
<div class="col-xs-3">

<form id="initialSearch" action="firstsleague.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Stats Corner</button>
      <div class="pos-rel">
       
    
</fieldset></form>


</tbody></table></div></fieldset></form></div>

<br><br>





<div class="">
<h3> Use the Search Boxes for Quick Results:</h3><h4> </h4><br>

<div class="input-daterange">
<form  action="" method="POST" class="well form-horizontal">
<fieldset>

<!-- Form Name -->
<legend >Quick Stats</legend>
  <tr> <td>  Add two dates and a staff members name into the empty search box on the right for results.</td>
       
   </tr><br>

<!--

<tr>
            <td>Date 1:</td>
            <td>

<div class="input-daterange">
            	<input class="datepicker " placeholder="e.g.15-December-2017" type="text"  id="start_date"  name="start_date"></td>
        </tr>
        <tr>
            <td> Date 2:</td>
            <td><input class="datepicker1 " placeholder="e.g. 01-December-2017"  type="text"    id="end_date"   name="end_date"  ></td>
        </tr>

        <input type="button" name="search" id="search" value="Search" class="btn btn" />

<div class="pos-rel">
<div class="col-xs-0">


</div></form></div>
-->

    <br>
<br>

<script>   // this changes drop down amounts in table .
$(document).ready(function(){
 
$.fn.dataTable.moment(  );


 //$('#example').DataTable();
    $('#example').DataTable({
      // just puts column 0 in descending order
      "order": [[ 0, "desc" ]]




    } );
});

</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">






 <script>

//create the pop up datepicker

  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-MM-yy' }).val();
  } );
  </script>

  <script>
  $( function() {
    $( ".datepicker1" ).datepicker({ dateFormat: 'dd-MM-yy' }).val();
  } );
  </script>



    <table class="table table-striped table-bordered  table-hover"  id="example" class="display" cellspacing="0" > <!--, table table-inverse-->


      <thead >
        <tr> 
         <!--   <th>User ID</th>    -->

          <th>Date Made</th>  
         
          <th>Surname</th>
          <th>Contact</th>
          <th>Email </th>
          
          <th>Introducer</th>
         
          <th>Branch</th>
          <th>Status</th>
        
              
              <th>Edit</th>
              
             
           <!--   <th>Edit</th>    -->
                              
        </tr> 
 </thead>
 <tbody>

<?php



$res=mysqli_query($conn, "SELECT f.numbers,f.usr_id, f.date_made, f.client_name, f.client_contact,f.client_email, u.name,u.surname, u.branch, f.status   
 FROM firsts f  inner join users u on u.id=f.usr_id  where  u.company_id = '".$_SESSION['company_id']."' ");

//u.id='".$_SESSION['company_id']."'



    while($row= mysqli_fetch_array($res))  { 
      //$status=($row->status==1)?'Active':'Suspend';
       echo "<tr>";
  //echo "<td> " . $row["usr_id"]."</td>";

//F = March
   //    echo"<td>". date('Y-m-jS',strtotime($row['date_made']))."</td>";
 echo"<td>". date('d-F-Y',strtotime($row['date_made']))."</td>";


        echo "<td> " . $row["client_name"]."</td>";
         echo "<td> " . $row["client_contact"]."</td>";
         echo "<td> " . $row["client_email"]."</td>";
         echo "<td> " . $row["name"]. ' '.$row['surname']."</td>";
        
        
         echo "<td> " . $row["branch"]."</td>";
        
         //  echo "<td> " . $row["status"]."</td>";

   //stack answer to choose a string from a db number/integer  
$options = [ 0 => "Passed Over", 1 => "Sign Up!!", 2 => "" ];
$row["status"] ;
echo "<td>". $options[$row["status"]]."</td>";



         

//echo "<td>      <a href='edit_intro.php?edit=$row[usr_id]'>Edit</a></td>    ";
echo "<td>      <a href='edit_intro.php?edit=$row[numbers]'>Edit</a></td>    ";
//numbers is a unique number so use this,,usr_id only gave first entry for each id
         echo "</tr>";
       }


?>


</tbody>
 </table> 



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>