
 <?php
//include 'dbh.php';
//include 'functions.php';
?>

   <nav class="navbar navbar-default navbar-inverse navbar-fixed-top ">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>  
        </button>
        
        <a class="navbar-brand" href="firsts_dashboard">IntroAgents</a>
      </div>


     


              <ul class="nav navbar-nav  "  id="bs-example-navbar-collapse-1">

          <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" 
            aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
            <ul class="dropdown-menu">
             

              <li><a href="firsts_dashboard">Home</a></li>
              <li><a href="firsts2">Make First</a></li>
              <li><a href="firstsleague">Stats</a></li>
                
                 <li><a href="firstsleadbook">Firsts-Book </a></li>
 <li role="separator" class="divider"></li>
              <li> 
  
<a href="register.php">Add User</a>     
          </li>


              <li><a href="user_admin">Users </a></li>
             
              
            </ul>
          </li>


<!-- Button trigger modal -->

</ul>

<div class="collapse navbar-collapse" id="navbar-collapse-01"> 
  <ul  class="nav navbar-nav navbar-right"    >
          
<?php   //usrname and usr_id are set in login.php
                 if (isset($_SESSION['usr_id'])) { ?>

                <li><p class="navbar-text">  Hello  <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href="logout.php">Log Out</a></li>
                <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register">Sign Up</a></li>
                <?php } ?>
          

</ul>


 

  </div>
  </div>
  </nav>



  <div><br></div>
  <br><br>





        
<!--
<ul class="nav navbar-nav ">

          <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" 
            aria-haspopup="true" aria-expanded="false">Lister <span class="caret"></span></a>
            <ul class="dropdown-menu">


          <li ><a href="table1.php">My Sellers</a></li>


          <li><a href="applicant_card.php">New Customer</a></li>
</ul>
          </li>
        </ul>

     

           <ul class="nav navbar-nav ">

          <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" 
            aria-haspopup="true" aria-expanded="false">Figures <span class="caret"></span></a>
            <ul class="dropdown-menu">
             
              <li><a href="figures2017.php">2017</a></li>
              <li><a href="figures2016.php">2016</a></li>
              <li><a href="figures2015.php">2015</a></li>
              <li><a href="figures2014.php">2014</a></li>
              <li><a href="figures2013.php">2013</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Compare Years</a></li>
            </ul>
          </li>
        </ul>


  
          <li><a href="portal.php">PORTAL</a></li>
          
          
          <form class="navbar-form navbar-left">
           <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>   
         
        </form>  



<form class="navbar-form navbar-right">
           <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div> 



         
        </form>






         -->



<!--    
NAVBAR FOR LOG IN AND REGISTER 



  <nav class="navbar navbar-inverse navbar-fixed-top 


    <div class="container">   <! -fluid spreads out the text 
        <!- add header 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Listalot </a>
        </div>
        <! menu items 
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="register.php">Create User</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br>


-->




  <!-- blue nav bar
  <div>

  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary navbar-fixed-top ">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Listalot |</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav navbar-right">
        <li class="nav-item active">
          <a class="nav-link" href="applicant_form.php">Home |<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link color-#ffffff"  href="applicant_card.php">New Customer |</a>
        </li>
        <li class="nav-item nav-item-right" style="text-align: right;">
          <a class="nav-link" href="file:///C:/Users/richw/Desktop/jQuery/listalot/sign_in.html">Log In |</a>
        </li>

  <-use this for full paid versions so user can see what missing out on.
        <li class="nav-item" >
          <a class="nav-link color-#ffffff" href="#">My Sellers |</a> 
        </li>

        <li class="nav-item" >
          <a class="nav-link color-#ffffff" href="#">My Figures |</a> 
        </li>

        <li class="nav-item" >
          <a class="nav-link color-#ffffff" href="#">News Page |</a> 
        </li>

        <li class="nav-item" >
          <a class="nav-link color-#ffffff" href="#">Members Area |</a> 
        </li>


      </ul>

  </div>
  </nav>
  <br>

  -->


