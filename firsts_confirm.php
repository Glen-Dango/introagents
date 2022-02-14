<?php

include 'dbh.php';
  include 'headercut.php';


  //   firstconfirm.php  is actioned by firsts2 ( make a first page) then user taken to firsts_confirm
?>


<!DOCTYPE html>
<html>
<head>
    <title> firsts_confirm.php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->




</head>
<body>







<br><br><br>


<style type="text/css">
  h1 {margin-left: 4.7em;  font-weight:bold; font-size: 550%;}
  h2 {margin-left: 4.7em;  font-weight:bold; font-size: 350%;}
  </style>
  
  <div class="container-fluid col-sm-12"><br>
  <h1><?php echo $_SESSION['usr_name']; ?>, You Made An Intro!     </h1><br>
  
<br><br><br>
</div>






<?php include 'your_stats.php'  ?>




<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12 "></div> 

<br> <br>





<h3><li type="square"> See how you and your team are performing by clicking on the buttons below.</li></h3>
<br>








   <!-- -fluid makes the table full width,,padding ect to get side space   -->

   <!--     images are in the same directory as C:\wamp64\www\listalot1   thats how it finds the picture. 
<div class="col-xs-12"></div>
<img src="images/firsts1" alt="Mountain View" width="1300" height="200">
-->
      
      <form id="initialSearch" action="firsts2.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Refer A Client</button>
      <div class="pos-rel">
       
  
</div></fieldset></form>


  <form id="initialSearch" action="firstsleague.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Stats Corner</button>
      <div class="pos-rel">
       
    
</fieldset></form>


</tbody></table>




 <form id="initialSearch" action="firstsleadbook.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Firsts-Book</button>
      <div class="pos-rel">
       
   
</div></fieldset></form>

</div>
</tbody></table></div>









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


<script>
  $(document).ready(function(){

 

  });













  </script>


<script src="ui.js"></script>




<!--

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

         3.2.0. below makes the collapse work.  -->

<script src="http://code.jquery.com/jquery-3.2.0.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>



</body>
</html>
    