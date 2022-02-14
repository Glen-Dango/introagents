

<!DOCTYPE html>
  <html lang="en">
    <head>


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<?php

//this posts/actions code from firsts2.php and then sends user to firsts_confirm.php for well done message

include 'dbh.php';
  


//set validation error flag as false
$error = false;
if (isset($_POST['submit'])) {

	//$company_name= $_SESSION['company_name'];  tryingh to get the comapny name to show as well in email

$name = $_SESSION['usr_name'];

$usr_id = $_SESSION['usr_id'];

$client_title =mysqli_real_escape_string($conn, $_POST['client_title']);
$client_name =mysqli_real_escape_string($conn, $_POST['client_name']);

//preg only allows numbers and not letters spaces or symbols to stop injection
$client_contact =preg_replace('/[^0-9]/', '', $_POST['client_contact']);
$client_email =mysqli_real_escape_string($conn, $_POST['client_email']);
if (!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
   $client_emailErr = "Invalid format and please re-enter valid email"; 
}



$notes =mysqli_real_escape_string($conn,$_POST['notes']);

$client_name=ucwords($client_name);


$status = mysqli_real_escape_string($conn, $_POST['status']);
//$advisor_name =$_POST['advisor_name'];  
//$neg =$_POST['neg'];
$advisor =$_POST['advisor'];
$sources =$_POST['sources'];

//take this out to stop o'brian from not working
 //if (!preg_match("/^[a-zA-Z ]+$/",$client_name)) {
 //       $error = true;
   //   echo  $name_error = "Name must contain only alphabets and space";
  //  }

 if (!$error) {  //md5($password) creates # long password into database for now use normal passwords .
 //if (mysqli_query(" names 'utf8'")); 
        if(mysqli_query($conn, "INSERT INTO firsts(usr_id, client_title, client_name, client_contact, client_email, notes , advisor,status,sources) VALUES('" . $usr_id . "','" . $client_title . "',  '" . $client_name . "', '" . $client_contact . "', '" .$client_email . "',  '" . $notes . "'  ,  '" . $advisor . "' ,  '" . $status . "' ,  '" . $sources . "'     )"  )) 




        {
            $successmsg = "You Successfully Registered A First! <a href='firsts_dashboard.php'>Click here to see your results.</a>";
        } else {
            $errormsg = "You entered an email that already exists...Please try again.";
        } 



    }


 // $_SESSION['email'] = $row['email'];




//$name = $_SESSION['usr_name'];
    $to = $_SESSION['email,rich@iconfive.com']; 
    //$tony = "rich@iconfive.co.uk";
    $email_subject = " $name  $usr_id   : Referral of Client: $client_title $client_name \n\n";
    $email_body = "Nice Work!  ,\nYou created a new intro.\r\n" 

     ."We will help your client right now.\n\n" 

        ."Here are the details:\n\n Name: $client_title  $client_name \n\n "
        .
        "Email: $client_email\n\n Contact: $client_contact\n\n Message: $notes";
    
 

    $headers = "From: introagents.co.uk\r\n" .
     "X-Mailer: php" . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .="BCC: enquiries@introagents.co.uk\r\n";
    
    //$headers= 'Reply-To: no-reply@introagents.co.uk' . "\r\n" . 
    	     
  
    mail($to, $email_subject,$email_body,$headers);



}





//i ran the header after the code to redirect user from firstconfirm.php after script run = no resubmit form issues then.
if(isset($_SESSION['usr_id'])) 
{
    header("Location: firsts_confirm.php");
}


//header("Location: public_html/listalot1/cron_job.php");

?>
</html>