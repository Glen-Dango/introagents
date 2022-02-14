
 


<!DOCTYPE html>
  <html lang="en">
    <head>


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="icon" href="../../favicon.ico">

      <title>table3.php</title>

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


    <!-- DataTables cnn  -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  
<!--  ///Datatables java   -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>


    </head>
  <!-- the navbar needs to be made into a header file really so can use on all pages without pasting all below code -->


    <body>
  <?php 

  require 'dbh.php';
    include 'headercut.php';

    ?>

<style type="text/css">
  h1 {margin-left: 2.3em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:left;}
   a { color: #e02181;}
  </style>




  <div class="container " col-sm-8>
  <h2 class="display-1">Edit your  property here... is this section for all property?  withdrawn etc<br><br>
 </h2>

</div>

<?php
//http://www.webslesson.info/2016/04/fetch-data-from-two-or-more-table-join-using-php-and-mysql.html



$sql = "SELECT * FROM portal INNER JOIN applicant_card ON portal.id = applicant_card.id";
$result = mysqli_query($conn, $sql);

 ?>  
  
           <div class="container" >  
                <div class="row">
              <div class="col-12"></div>               
               
                     <table class="table table-striped table-bordered  table-hover"  id="example" cellspacing="0" > 
                     <thead > 
                          <tr>  
                               <th>ID</th> 
                               <th>Price</th> 
                               <th>Street</th>
                               <th>Postcode</th>
                               <th>Edit</th>  
                          </tr>
                          </thead >  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["id"];?></td>
                               <td><?php echo $row["price"];?></td>   
                               <td><?php echo $row["street"]; ?></td>
                               <td><?php echo $row["postcode"]; ?></td>
<?php
                         echo  "<td>  <a href='edit_portal.php?update=$row[id]'>Edit Your Property </a> </td>" ?>
                                
                             
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                          </foot>

                     </table>  
                </div>  
           </div>  
           <br />  






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


