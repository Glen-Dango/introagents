<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12"></div>

<table class="table table-striped table-bordered  table-hover"   id="example" cellspacing="0" > <!--, table table-inverse-->

      <thead >
        <tr >
         <th>Name</th>
          <th>Company</th>
          
          <th>Total Firsts Ever</th>
          <th>Total For Year</th>
          <th>Firsts Made This Month</th>
         
          <th>Firsts Made last 7 days</th>
          <th>Firsts Made Today</th>
          
                         
        </tr> 
 </thead>


<tbody >

      <?php 


  // troulle is no entry for user without a value..select statement is joining wrong so user not displayed unless they have a value. 

$result = mysqli_query($conn,"SELECT id, name, surname from users where id = '".$_SESSION['usr_id']."'
    ");  

 
        while($firsts=mysqli_fetch_assoc($result)){
        
{
     

        echo "<tr>";
        //changes date to english format from a time stamp
       // echo"<td>".$firsts['usr_id']."</td>";
        //echo"<td>".$firsts['company_id']."</td>";


//totoal firsts ever
         echo"<td>".$firsts['name']. ' '.$firsts['surname']."</td>";
       
$result = mysqli_query($conn,"SELECT  f.usr_id, u.id, u.name , u.surname,c.company_name, c.company_id, count(f.usr_id) as num_rows  from firsts f left outer join users u on u.id = f.usr_id  left join company c on u.company_id = c.company_id  group by f.usr_id having f.usr_id ='".$_SESSION['usr_id']."'
    ");  

 
        while($firsts=mysqli_fetch_assoc($result)){




         echo"<td>".$firsts['company_name']."</td>";


        echo"<td>".$firsts['num_rows']."</td>";
        
        //total firsts ever
$result = mysqli_query($conn,"SELECT count(date_made) as total_ever FROM firsts where year(curdate()) = year(date_made) and usr_id= '".$_SESSION['usr_id']."'");

      	while($firsts=mysqli_fetch_assoc($result)){


 			
 			echo"<td>".$firsts['total_ever']."</td>";

//total this cal_days_in_month(calendar, month, year)                                 month(curdate()) = month(date_made)

$result = mysqli_query($conn,"SELECT count(date_made) as this_month FROM firsts WHERE MONTH(date_made) = MONTH(curdate()) AND YEAR(date_made) = YEAR(CURRENT_DATE()) and usr_id='".$_SESSION['usr_id']."' ");



      	while($firsts=mysqli_fetch_assoc($result)){
			echo"<td>".$firsts['this_month']."</td>";




	$result = mysqli_query($conn,"SELECT count(date_made) as last7_days FROM `firsts` WHERE DATE(`date_made`) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() and usr_id='".$_SESSION['usr_id']."'   ");


      	while($firsts=mysqli_fetch_assoc($result)){
			echo"<td>".$firsts['last7_days']."</td>";



	$result = mysqli_query($conn,"SELECT count(date_made) as made_today FROM `firsts` WHERE DATE(`date_made`) = CURDATE() and usr_id='".$_SESSION['usr_id']."'  ");

  
      	while($firsts=mysqli_fetch_assoc($result)){
      		echo"<td>".$firsts['made_today']."</td>";

 			
}}}}}}}
 
?>


</tbody>

  </table>
