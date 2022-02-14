<?php
include 'dbh.php';
include 'headercut.php';
include ('functions.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title> firsts_dashboard.php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >

<link rel="stylesheet" type="text/css" href="portal.css"> <!-- links to css for pink buttons -->


<!-- bootstrap theme i.e. makes it work and look good   i.e the css stylesheet -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="ui.js"></script>


</head>
<body>



<style type="text/css">
  h1 {margin-left: 4.7em;  font-weight:bold; font-size: 550%;}
  h2 {text-align:4.7em ;} 


    /* body { background: rgb(245,245,245)!important; }   */

body{
  background: #ECE9E6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}


  </style>
  
  <div class="container-fluid col-sm-12">
  
  <h1>IntroAgents... </h1>

<?php




?>

<br>
<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->


<div class="row">

    <div class="col-xs-6">
<div  style=" float: left; margin-left: 2px; width: 460px; "> 
      <form id="initialSearch" action="firsts2.php" method="get">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Refer A Mortgage Client</button>

 &nbsp; &nbsp; &nbsp; 
 <form id="initialSearch" action="firsts2.php" method="get">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Refer A Legal Client</button>

</div></form>

<br>

<br>
</div>
<br>

<?php include 'facebook_style_stat.php';
   include 'your_stats.php';  
   ?>

     
<div >
  
  
<h2>Company Overview</h2>
</div>


<?php

//total for Year
$query = "SELECT  u.company_id, u.branch, u.name, u.surname, u.id, count(f.usr_id) as sums FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id AND DATE(f.date_made) and year(curdate()) = year(date_made)  where u.company_id='".$_SESSION['company_id']."'   group by u.id  order by count(f.usr_id) desc limit 5  ";



$res = $conn->query($query);

?>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        // ['Task', 'Hours per Day'],
        //  ['Deb',     11],
         // ['Lisa',      2],
           ['usr_id' , 'sums'],

<?php
while($row=$res->fetch_assoc())
{

	echo "['".$row['name'].' '.$row['surname'].'-'.$row['branch'] .  "',".$row['sums']."],";
}

?>
          
        ]);

        var options = {
          title: 'Company % This Year',
          colors: ['#ff33cc', '#000000', '#8000ff', '#595959', '#000000'],
          fontSize: '11',
          is3D:true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 
  
    <div 
    id="piechart" style="float: left; margin-left: 01px;  width: 660px; height: 300px; border: 2px solid #D6DBDF  ">
  </div>



<?php    //this month

//$query =  "SELECT u.company_id, u.branch, u.name, u.surname, u.id, count(f.date_made) as sums FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  and  month(curdate()) = month(date_made)  where  u.company_id='".$_SESSION['company_id']."' group by u.id  order by count(f.usr_id) desc  " ;


$query =  "SELECT u.company_id, u.branch, u.name, u.surname, u.id, count(f.date_made) as sums FROM users u LEFT JOIN firsts f ON u.id  = f.usr_id  and  month(curdate()) = month(date_made) AND YEAR(date_made) = YEAR(CURRENT_DATE())  where  u.company_id='".$_SESSION['company_id']."' group by u.id  order by count(f.usr_id) desc  " ;


$res = $conn->query($query);


//$result = mysqli_query($conn,"SELECT count(date_made) as this_month FROM firsts WHERE MONTH(date_made) = MONTH(curdate()) AND YEAR(date_made) = YEAR(CURRENT_DATE()) and usr_id='".$_SESSION['usr_id']."' ");




?>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        // ['Task', 'Hours per Day'],
        //  ['Deb',     11],
         // ['Lisa',      2],
           ['usr_id' , 'sums'],

<?php
while($row=$res->fetch_assoc())
{

	echo "['".$row['name'].' '.$row['surname']."',".$row['sums']."],";

}

?>
          
        ]);

        var options = {
          title: 'Company % This Month',
          pieHole: 0.4,
          fontSize: '11',
          colors: ['#ff33cc', '#000000', '#8000ff', '#595959', '#000000'],
         // is3D:true
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
 
  
    <div  id="piechart1" style="  float: right; margin-right:0px;   width: 500px; height: 300px; border: 2px solid #D6DBDF"></div>


</div>

</div>

<br>


  <form id="initialSearch" action="firstsleague.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Stats Corner</button>
      <div class="pos-rel">
       
    
</fieldset></form>


</tbody></table>

<br>


 <form id="initialSearch" action="firstsleadbook.php" method="get"><fieldset class="fieldset">
    <button name="buy" class="btn -btn" id="buy" type="submit" value="For sale">Firsts-Book</button>
      <div class="pos-rel">
       
   
</div></fieldset></form>

</div>
</tbody></table></div>





<?php

$query ="SELECT  MONTH(date_made) AS month, COUNT(*) AS monthly_sales_count
FROM firsts
WHERE usr_id
AND YEAR(date_made) = 2018
GROUP BY month";

$res = $conn->query($query);


?>


<?php //include 'footer.php';




 ?>
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
    