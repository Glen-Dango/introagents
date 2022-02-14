<?php 


     
$query= "SELECT   count(status) as status from firsts where status=1 and usr_id='".$_SESSION['usr_id']."'    ";

      $result = mysqli_query($conn, $query);
      
      while($firsts=mysqli_fetch_assoc($result)){

?>

<div class="container">    <!-- -fluid makes the table full width,,padding ect to get side space   -->
<div class="row">
    <div class="col-xs-12 "></div> 



<div  style=" float: left; margin-left: 18px; width: 460px;    border: 1px solid #D6DBDF  ">



<div  class="_2ph_"><div class="_8m- _550r  _550v _550w"><div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; overflow-wrap: normal; text-align: left; color: rgb(144, 148, 156);"
	>Your Stats: </div>



<div class="_5527 _1x6b"><div class="_5528"><span density="taut" labelposition="top" id="js_t" class="_2l13"><div class="_8mq" style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"><span style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; font-weight: bold; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"
	>Mortgages To Date =  <?php echo $firsts['status'];} ?>   </span>  



<?php 
$query= "SELECT  concat(round((AVG(status=1)*100),0),'%') as average  from firsts 
where  usr_id='".$_SESSION['usr_id']."' 
   ";

      $result = mysqli_query($conn, $query);
      
      while($firsts=mysqli_fetch_assoc($result)){

?>

<div class="_8mq" ><span style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; font-weight: bold; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"
	>Your Intro's To Sign Up Rate = <?php echo $firsts['average'];} ?>   </span>

<?php 
$query= "SELECT  concat(round((AVG(status=1)*100),0),'%') as averages  from firsts where usr_id=usr_id
 
   ";

      $result = mysqli_query($conn, $query);
      
      while($firsts=mysqli_fetch_assoc($result)){

 //echo '<br>';
 //echo $firsts['average'];
?>


<div class="_8mq" ><span style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; font-weight: bold; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"
	>National Sign Up Average =<?php echo $firsts['averages'];} ?>

</span>

  <div class="_8mq" ><span style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; font-weight: bold; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"
  	>Your Rank This Year = 10th out of 300(fake result) </span>



<?php   
//selfgen();

$query= "SELECT   count(sources) as sources from firsts where sources=0 and
 YEAR(date_made) = YEAR(CURDATE())";


$result = mysqli_query($conn, $query);
      while($firstsz=mysqli_fetch_assoc($result)){
?>

    <div class="_8mq" ><span style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; font-weight: bold; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"
    >Office Leads Self Generated, This Year= <?php echo $firstsz['sources'];} ?> </span>





<?php    
//webgen();  

  $query= "SELECT count(sources) as sources from firsts where  YEAR(date_made) = YEAR(CURDATE())
and sources=1 ";

      $result = mysqli_query($conn, $query);
      while($firstss=mysqli_fetch_assoc($result)){


?>

     <div class="_8mq" ><span style="font-family: Arial, sans-serif; font-size: 12px; line-height: 16px; letter-spacing: normal; font-weight: bold; overflow-wrap: normal; text-align: left; color: rgb(29, 33, 41);"
    >Office Leads Web Generated, This Year = <?php echo $firstss['sources'];} ?> </span>

</div></div></div></div></div></div></span>

</div></div></div></div></div></div>

