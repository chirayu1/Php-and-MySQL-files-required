<?php
  $conn = mysqli_connect("sql2.njit.edu", "cp262", "pmq1HTaX", "cp262") or die(mysqli_error());
  //$conn = mysqli_connect("localhost", "id2473271_user", "pass123", "id2473271_animodules") or die(mysqli_error());
  //echo "Database is working!";
  //$response["success"] = true;
  
  if(isset($_POST['email'])){
    $email = $_POST['email'];
      
    $response = array();
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$email."'") or die(mysqli_error());
    $exists = mysqli_num_rows($query);    // if that specific row exists
    
   if($exists > 0)
    {
      while($row = mysqli_fetch_assoc($query))
      {
        $db_fname = $row['firstName'];
        $db_email = $row['email'];
        $db_pass = $row['password'];
        $db_user = $row['username'];
      }
    }
    
    if($email != $db_email)
    {
      $response["success"] = false;
    }
    else
    {
      $response["success"] = true;
      
      $to = $email;
   
      
      $subject = "Your Recovery Password";
      $message  = "Hi ". $db_fname. ",\n";
      $message .= "\n";
      $message .= "Your username: ". $db_user . "\n";
      $message .= "Your password: ". $db_pass . "\n";
      $message .= "\n";
      $message .= "Your friends, \n Animodules!";
 
      
      $headers  = "From: <noreply@animodules.com>\r\n";
      //$headers .= 'MIME-Version 1.0' . "\r\n";
      //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      
      
      mail($to,$subject,$message,$headers);
      /*if(mail)
      {
        echo "1";
      }
      else
      {
        echo "0";
      } */
    }
  }
  
    echo (json_encode($response));
?>