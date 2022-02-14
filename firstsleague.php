
<?php
include 'dbh.php';
include 'headercut.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title> firstsleague.php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->


</head>

<body >

<style >
  h1 {margin-left: 4.2em;  font-weight:bold; font-size: 550%;}
  
  </style>
  <br>

  <div class="container col-xs-12">
  <h1>Intro-Stats...</h1>
  
<br><br></div>

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
       
   
</div></fieldset></form>


</tbody></table></div>

<div class="container">
<div class="row">

<div class="col-xs-3">


<form id="initialSearch" action="firstsleadbook.php" method="get"><fieldset class="fieldset">
  <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Firsts-Book</button>
      <div class="pos-rel">
       
   
</div></fieldset></form>

</div>
</tbody></table></div>





  <br><br><br>

  <div class="">
  
  <h2>Your Stats.</h2>
</div>



<?php include 'your_stats.php'  ?>




     <br> <br>

  
    
 <div class="">
  
  <h2>Your Company Stats.</h2>
</div>




<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12"></div>


<table class="table table-striped  table-bordered  table-hover"  > <!--, table table-inverse   table-bordered     -->

 <thead >
<tr >

           
           <th>Branch</th>
           <th>Name</th>
           <th>Total Ever</th>
           <th>Total Year</th>
           <th>Total This Month</th>
           <th>Total Week</th>
           

   <!--    <th>Total Year</th>    -->
  </tr> 
 </thead>


<tbody >
      <?php 
     

//TOTAL EVER & total for year
$result = mysqli_query($conn,"SELECT 
  u.company_id, u.branch, u.name ,u.surname, u.id, 
   count(f.date_made) as num_rows    , 
   SUM(CASE WHEN YEAR(f.date_made) = YEAR(CURDATE()) THEN 1 ELSE 0 END) as totalyear ,
                        
   Sum(CASE WHEN month(f.date_made)=month(curdate())  AND YEAR(date_made) = YEAR(CURRENT_DATE())    THEN 1 ELSE 0 END) as totalmonth  ,
   Sum(CASE WHEN week(f.date_made)=week(curdate()) THEN 1 ELSE 0 END) as totalweek

  FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  where u.company_id='".$_SESSION['company_id'].  "'   group by u.id  order by num_rows DESC limit 10  ") ;


// cant get the last 7 days to work
//Sum(CASE WHEN date(f.date_made)= BETWEEN CURDATE() - INTERVAL 7 DAY and curdate()  ) THEN 1 ELSE 0 END) as total7


$grand_total_ever = 0;
$grand_total_year = 0;

// creates numbers in the table
$num_rows =1;

while($firsts=mysqli_fetch_array($result))
{ 



 echo "<tr>";
 // echo"<td>".''."</td>";
 //echo"<td>".$num_rows++."</td>";        this the counter 1 2,3 4 5 6 

        //changes date to english format from a time stamp
  //echo"<td>".$firsts['company_id']."</td>";
  echo"<td>".$firsts['branch']."</td>";
  // echo"<td>".$firsts['id']."</td>";
 echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";
       
       echo"<td>".$firsts['num_rows']."</td>";
echo"<td>".$firsts['totalyear']."</td>";
echo"<td>".$firsts['totalmonth']."</td>";
echo"<td>".$firsts['totalweek']."</td>";
//echo"<td>".$firsts['total7']."</td>";

     //  echo "</tr>";

}



//total ever 

$result = mysqli_query($conn, "SELECT count(f.date_made) as date_madesss FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id   where u.company_id='".$_SESSION['company_id']."'   ");



       while($firsts=mysqli_fetch_array($result)){

      echo "<tr>";
      
echo"<td>".'Total'."</td>";
//echo"<td>".''."</td>";
echo"<td>";
//echo"<td>";
      echo"<td>".$firsts['date_madesss']."</td>";
       //echo"<td>".$firsts['date_madess']."</td>";




}        //total for year (i)

 $result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  WHERE year(curdate()) = year(date_made)  and  u.company_id='".$_SESSION['company_id']."'    ");


       while($firsts=mysqli_fetch_array($result)){


      echo"<td>".$firsts['date_mades']."</td>";


       }                                                            ///////////////////////\\\\\\\\\\\\\\\\\\\\\\

     //total for MONTH
 $result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  WHERE  month(f.date_made)=month(curdate())  AND YEAR(date_made) = YEAR(CURRENT_DATE())  and  u.company_id='".$_SESSION['company_id']."'    ");



      while($firsts=mysqli_fetch_array($result)){


   echo"<td>".$firsts['date_mades']."</td>";

       }



//counts total leads for users with same company_id
$result = mysqli_query($conn, "SELECT count(f.date_made) as date_mad FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  WHERE  week(curdate()) = week(date_made)  and  u.company_id='".$_SESSION['company_id']."'    ") ;

//year(curdate()) = year(date_made) and

       while($firsts=mysqli_fetch_array($result)){

     // echo "<tr>";
//echo"<td>".'Total'."</td>";
//echo"<td>".''."</td>";
//echo"<td>".''."</td>";
      echo"<td>".$firsts['date_mad']."</td>";

       }




?>

</tbody>
</table>
</div>
</div><br><br>




    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">

<div class="col-xs-4">


<table class="table table-striped  table-bordered  table-hover"  >  <!--, table table-inverse  table-bordered        -->

<thead >
<tr >
          <th>Branch</th>
         
          <th>Name</th>

          
      <!--    <th>Total Firsts Ever</th> -->
          <th>Total For Year</th>
    
                         
 </tr> 
 </thead>


<tbody >
<?php        //TOTAL FOR YEAR


//$result = mysqli_query($conn,"SELECT users.company_id,users.name,users.surname,  firsts.usr_id, count(usr_id)  as date_mades  FROM firsts inner join users on users.id=firsts.usr_id WHERE date_made >= '2017-01-01' and date_made < 'curdate'  group by usr_id ");


//TOTAL FOR YEAR
$result = mysqli_query($conn,"SELECT u.company_id,  u.branch,u.name,u.surname,  u.id, count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id AND DATE(f.date_made) and year(curdate()) = year(date_made)  where u.company_id='".$_SESSION['company_id']."'  group by u.id  order by date_mades DESC limit 10  ");


    
//WHERE date_made >= '2017-01-01' and date_made < 'curdate'  group by usr_id having users.company_id='".$_SESSION['company_id']."'    
   // year(curdate()) = year(date_made) 
//group by firsts.usr_id  having users.company_id='".$_SESSION['company_id']."'

    // WHERE year(curdate()) = year(date_made) and month(curdate()) = month(date_made)

        while($firsts=mysqli_fetch_array($result)){
 echo "<tr>";
 //echo"<td>".$firsts['company_id']."</td>";
 echo"<td>".$firsts['branch']."</td>";
 //echo"<td>".$firsts['id']."</td>";
 echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";
      
      echo"<td>".$firsts['date_mades']."</td>";



 



}

//original  totals all in firsts
  //$result = mysqli_query($conn,"SELECT count(date_made) as date_mades from firsts  ");


  //$result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id    and   u.company_id='".$_SESSION['company_id']."'    ");

  $result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  WHERE year(curdate()) = year(date_made)  and  u.company_id='".$_SESSION['company_id']."'    ");

//7 days total 
 // $result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  AND DATE(f.date_made) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()  and u.company_id='".$_SESSION['company_id']."'    ");

       while($firsts=mysqli_fetch_array($result)){

      echo "<tr>";
echo"<td>".'Total'."</td>";
echo"<td>".''."</td>";
//echo"<td>".''."</td>";
      echo"<td>".$firsts['date_mades']."</td>";


       }


?>

</tbody>

</table>
</div>




    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">

<div class="col-xs-4">


<table class="table table-striped  table-bordered  table-hover"  > 



<thead >
<tr >
        <th>Branch</th>
          
           <th>Name</th>
            
      <!--    <th>Total Firsts Ever</th>
          <th>Total For Year</th>
          <th>This Month</th>   -->
               
                        <th> This Month</th>
  
                         
</tr> 
</thead>


<tbody >
<?php                                 //last month 




$result = mysqli_query($conn,"SELECT u.id , u.name , u.surname ,  u.company_id, u.branch, count(f.date_made) as date_made FROM users  u LEFT JOIN firsts f ON u.id  = f.usr_id AND DATE(f.date_made) and  month(curdate()) = month(date_made) AND YEAR(date_made) = YEAR(CURRENT_DATE())   where u.company_id='".$_SESSION['company_id']."'  group by u.id order by date_made DESC limit 10  ") ;


//WHERE year(curdate()) = year(date_made) and month(curdate()) = month(date_made)


        while($firsts=mysqli_fetch_assoc($result)){
 echo "<tr>";

echo"<td>".$firsts['branch']."</td>";

 echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";
 
//echo"<td>";echo"<td>";echo"<td>";
    //  print  ' You made ';
      echo"<td>".$firsts['date_made']."</td>";

}  
//counts total leads for users with same company_id
$result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  WHERE  month(f.date_made)=month(curdate())  AND YEAR(date_made) = YEAR(CURRENT_DATE())  and  u.company_id='".$_SESSION['company_id']."'    ") ;

//year(curdate()) = year(date_made) and

       while($firsts=mysqli_fetch_array($result)){

      echo "<tr>";
echo"<td>".'Total'."</td>";
echo"<td>".''."</td>";
//echo"<td>".''."</td>";
      echo"<td>".$firsts['date_mades']."</td>";

       }
?>

</tbody>

</table>
</div>



     

  <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">

<div class="col-xs-4">


<table class="table table-striped  table-bordered  table-hover"  >  



<thead >
<tr >
          <th>Branch</th>
       
           <th>Name</th>
             
      <!--    <th>Total Firsts Ever</th>
          <th>Total For Year</th>
          <th>This Month</th>   -->
         
          
          <th> Last 7 days</th>
     <!--     <th>Firsts Made Today</th>
          <th>Position For Month</th>
          
          <th>Position For Year</th>
          <th>This Week</th>    -->
         
                         
</tr> 
</thead>


<tbody >
<?php                        //last 7 days


//code below take out session and this will give all the users...use this for top 10 places..

$result = mysqli_query($conn,"SELECT u.name , u.surname , u.id , u.company_id, u.branch, count(f.date_made) as date_made FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  AND DATE(f.date_made) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()   where u.company_id='".$_SESSION['company_id']."'  group by u.id  order by date_made DESC limit 10  ") ;


        while($firsts=mysqli_fetch_assoc($result)){
 echo "<tr>";
//echo"<td>".$firsts['name']."</td>";
//echo"<td>".$firsts['company_id']."</td>";
echo"<td>".$firsts['branch']."</td>";
 // echo"<td>".$firsts['id']."</td>";
 echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";

//echo"<td>";echo"<td>";echo"<td>";
    //  print  ' You made ';
      echo"<td>".$firsts['date_made']."</td>";

}

//this totals users by their company id
 
$result = mysqli_query($conn, "SELECT count(f.date_made) as date_mades FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  AND DATE(f.date_made) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()  and u.company_id='".$_SESSION['company_id']."'   ");





//$result = mysqli_query($conn, "SELECT u.name , u.surname, f.usr_id, COUNT(f.usr_id) AS totalfirstsever FROM users u JOIN firsts f on u.id  = f.usr_id  group by f.usr_id order by totalfirstsever DESC limit 10 ");



       while($firsts=mysqli_fetch_array($result)){

      echo "<tr>";
echo"<td>".'Total'."</td>";
echo"<td>".''."</td>";
//echo"<td>".''."</td>";
      echo"<td>".$firsts['date_mades']."</td>";


       }


?>


</tbody>

</table>
</div></div>

<br>



<div class="container">


<div class="pull-left">

  
  <h2 align="left">National Top 10 Introducers.</h2>





    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12"></div>


<table class="table table-striped  table-bordered  table-hover"  >


<thead >
<tr >

<th>Rank</th>
           <th>Name</th>
            <th>Company</th>
           <th>Branch</th>
          
         
 
          <th> National Top 10 Ever</th>
     
               
                
</tr> 
</thead>


<tbody >
    
<?php    //  NATIONAL TOP 10 EVER







//$result = mysqli_query($conn, "SELECT  usr_id, COUNT(usr_id) AS totalfirstsever FROM firsts   group by usr_id order by totalfirstsever DESC limit 10 ");

$result = mysqli_query($conn,  "SELECT  
  c.company_name , u.branch, u.name , u.surname, f.usr_id,COUNT(f.usr_id) AS totalfirstsever FROM users u JOIN firsts f on u.id  = f.usr_id  left join company c on u.company_id = c.company_id  group by f.usr_id order by totalfirstsever DESC limit 10 ");

$num_rows =1;
//($num_rows =1  ,  $num_rows<10 ,  $num_rows++      );
 //while($num_rows <= 10)
 // {
  //echo "  $x <br> ";
//$x++;


//$row = mysql_fetch_row($result);

while($firsts=mysqli_fetch_array($result)){


echo "<tr>";
echo"<td>".$num_rows++."</td>";
echo"<td>"  .$firsts['name']. ' '.$firsts['surname']."</td>";
echo"<td>".$firsts['company_name']."</td>";
echo"<td>".$firsts['branch']."</td>";
//echo"<td>".$firsts['usr_id']."</td>";
echo"<td>".$firsts['totalfirstsever']."</td>";





}
//}

//$x=1;
 
//while($x <= 10) {
 // echo "  $x <br> ";
//$x++;
//} 




?>
<br>
<br>
<br>
</tbody></table></div>



   <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12"></div>


<table class="table table-striped  table-bordered  table-hover"  >


<thead >
<tr >
           <th>Rank</th>
           <th>Name</th>
           <th>Company</th>
         <th>Branch</th>
 
          <th> National Top 10 This Year</th>
                     
</tr> 
</thead>


<tbody >

<?php   



//$result = mysqli_query($conn, "SELECT  usr_id, count(date_made) AS total_year FROM firsts where DATE(date_made) and year(curdate()) = year(date_made)    group by usr_id order by total_year DESC limit 10 ");


$result = mysqli_query($conn, "SELECT c.company_name,u.branch,  u.name , u.surname, f.usr_id, count(f.date_made) AS total_year  FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  left join company c on u.company_id = c.company_id where DATE(f.date_made) and year(curdate()) = year(f.date_made)    group by f.usr_id order by total_year DESC limit 10 ");

$num_rows=1;
while($firsts=mysqli_fetch_array($result)){

//rank attaches to usr_id not firsts





echo "<tr>";
echo"<td>".$num_rows++."</td>";
echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";
echo"<td>".$firsts['company_name']."</td>";
echo"<td>".$firsts['branch']."</td>";
//echo"<td>".$firsts['usr_id']."</td>";
echo"<td>".$firsts['total_year']."</td>";

}

?>
<br>
<br>
<br>
</tbody></table>






<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12"></div>


<table class="table table-striped  table-bordered  table-hover"  >


<thead >
<tr >
          <th>Rank</th>
          <th>Name</th>
         <th>Company</th>
         <th>Branch</th>
 
          <th> National Top 10 This Month</th>
                     
</tr> 
</thead>


<tbody >

<?php   




//TOTAL MONTH ALL USERS TOP 10

$result = mysqli_query($conn, "SELECT c.company_name , u.branch, u.name , u.surname, f.usr_id, count(f.date_made) AS total_year  FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id left join company c on u.company_id = c.company_id     where DATE(f.date_made) and month(f.date_made)=month(curdate())  AND YEAR(date_made) = YEAR(CURRENT_DATE())  group by f.usr_id  order by total_year DESC limit 10 ");

$num_rows=1;
while($firsts=mysqli_fetch_array($result)){


echo "<tr>";
echo"<td>".$num_rows++."</td>";
echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";
echo"<td>".$firsts['company_name']."</td>";
echo"<td>".$firsts['branch']."</td>";
//echo"<td>".$firsts['usr_id']."</td>";
echo"<td>".$firsts['total_year']."</td>";

}

?>
<br>
<br>
<br>
</tbody></table></div></div>


<div class="row">

<div class="col-xs-6">


<form id="initialSearch" action="firsts_dashboard.php" method="get"><fieldset class="fieldset">
  <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Dashboard</button>
      <div class="pos-rel">
       
   
</div></fieldset></form>

<br></div></div>


<button class="btn -btn" onclick="topFunction()" id="myBtn" title="Go to top">Top</button> <br><br><br>




<script>  //scrolls page to top on click of button at bottom of page
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 
</script>

<script src="http://code.jquery.com/jquery-3.2.0.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>