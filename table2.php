 
 <?php
  include 'dbh.php';
  include 'headercut.php';
  ?>



 <!DOCTYPE html>
  <html lang="en">
    <head>


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="icon" href="../../favicon.ico">

      <title>table2.php</title>

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

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- css style from portal.css to get pink -->
    <!-- DataTables cnn  -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  
<!--  ///Datatables java   -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>


    </head>
  <!-- the navbar needs to be made into a header file really so can use on all pages without pasting all below code -->


    <body>


<style type="text/css">
  h1 {margin-left: 2.3em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:left;}
  a { color: #e02181;}
  </style>

<br>
  <div class="container" col-sm-12">
  <h2 class="display-1">Create a new client, before you Upload...<br></h2>

  <h3><a  href="http://localhost/listalot1/applicant_card.php">Create A New Client</a></h3> <br><br>
 

  

</div>



  
<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-12"></div>





   <!-- https://datatables.net/         also see javascript at bottom of page which links the id=example     -->
   
    <table class="table table-striped table-bordered  table-hover"  id="example" cellspacing="0" > <!--, table table-inverse-->

      <thead >
        <tr >
          <th>id</th>
         
          <th>Surname</th>
          <!--<th>Email</th>-->
             
              <th>Post Code</th>
              <th>Address 1</th>
            
              <th>City</th>          
         
              <th>Portal Upload</th>
             
                          
        </tr> 
 </thead>



<tbody >
      <?php 

      

      $query = "SELECT id, last_name, postcode, street, city FROM applicant_card";
      $result = mysqli_query($conn, $query);
      //this loops every row in the table.  
      while($applicant_card=mysqli_fetch_assoc($result)){


        echo "<tr>";
        //changes date to english format from a time stamp
        echo"<td>".$applicant_card['id']."</td>";
       
      
        echo"<td>".$applicant_card['last_name']."</td>";
       
        echo"<td>".$applicant_card['postcode']."</td>";
        echo"<td>".$applicant_card['street']."</td>";
        
        echo"<td>".$applicant_card['city']."</td>";
        
       
        
        
        echo "<td><a href='portal_upload.php?update=$applicant_card[id]'> Upload Area</a></td>";
         //echo "<td><a href='edit_portal.php?update=$applicant_card[id]'>Edit Record ( after uploaded to portal)</a></td>";
        
      }

     
  ?>
</tbody>
      <tfoot>
            <tr>
                <th>id</th>
         
         
          <th>Surname</th>
          <!--<th>Email</th>-->
             
              <th>Post Code</th>
              <th>Address 1</th>
             
              <th>City</th>          
              
              
              
              <th>Upload</th>
             
            </tr>

</tfoot>

 </table> 
</div>

</div>



<script type="text/javascript">


// calling the id in table = example   ,,  binds the whole table so in this case the colours of days on market change colour on all the table and not just the top 10 rows in the first display table. 
$(function(){
    $('#example').on('click', '.toggleTest', function(e){
        var id = $(this).data('id');
        $("#example-"+id).html("Done");
        return false;
    });



// this makes the datatable work...
$(document).ready(function(){
    var table = $('#example').DataTable(); 
   //this is th artwork for the whole table. 

 });


// click the row to get a mdal show up. handy to show all info on an applkcant?
   
    $('#example tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    } );
});


</script>




<script src="ui.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>






  </body>
  </html>


