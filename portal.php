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

      <title>portal.php</title>

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

<!--include file for css file -->
 <link rel="stylesheet" type="text/css" href="portal.css"> 


 

<br><br><br><br><br><br>

<div class="container">


<div class="display-table width-100 height-100">
    <div class="display-table-cell vertical-middle align-center">
      <!--<span class="block strapline-intro">Find your happy</span>    -->
      <h1 class="hero-strapline">Search properties for sale in the UK</h1>

       <div class="form-group">
       <div class="col-lg-4">
            <input type="text" class="form-control" autocomplete="off" placeholder="Search for property: e.g. London, HR1, NW3 5TY "">
          </div> 

      <form id="initialSearch" action=".php" method="get"><fieldset class="hero-fieldset">
        <div class="inline-block">

    <input name="searchLocation" class="search-location js-typeahead-ready" id="searchLocation" type="hidden" placeholder="e.g. 'York', 'HR1', 'NW3 5TY' or 'Waterloo Station'" value="" autocomplete="off">

    <input name="locationIdentifier" id="locationIdentifier" type="hidden" value="">
    <input name="useLocationIdentifier" id="useLocationIdentifier" type="hidden" value="false">

    <button name="buy" class="btn hero-btn" id="buy" type="submit" value="For sale">For sale</button>


      <div class="pos-rel">

        <ul class="type-ahead-list" id="typeaheadList" style="display:none"></ul>
    </div>
</div>


</fieldset>
</form></div>
  </div>

  <br><br><br><br><br><br>

  <div class="display-table width-100 height-100">
    <div class="display-table-cell vertical-middle align-center">
      <!--<span class="block strapline-intro">Find your happy</span>    -->
      <h2     class="hero-strapline">Launch A Property</h2>
      <form id="initialSearch" action="http://localhost/listalot1/table2.php" method="get"><fieldset class="hero-fieldset">
        <div class="inline-block">
    <input name="locationIdentifier" id="locationIdentifier" type="hidden" value=""><input name="useLocationIdentifier" id="useLocationIdentifier"  type="hidden" value="false"><button name="buy" class="btn hero-btn" id="buy" type="submit" value="For sale">Launch A Property</button>
      <div class="pos-rel">
        <ul class="type-ahead-list" id="typeaheadList" style="display:none"></ul>
</div></div></fieldset></form></div></div></div>





<br><br><br><br><br><br>
<div class="container"> 
      <h2 class="hero-strapline">Edit A Live Property</h2>
      <form id="initialSearch" action="http://localhost/listalot1/table3.php" method="get"><fieldset class="hero-fieldset">
        <div class="inline-block">
    <input name="locationIdentifier" id="locationIdentifier" type="hidden" value=""><input name="useLocationIdentifier" id="useLocationIdentifier"  type="hidden" value="false"><button name="buy" class="btn hero-btn" id="buy" type="submit" value="For sale">Edit A Property</button>
      <div class="pos-rel">
        <ul class="type-ahead-list" id="typeaheadList" style="display:none"></ul>

    </div>
</div></fieldset></form></div></div></div>






<script src="ui.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>




  </body>
  </html>