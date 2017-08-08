<?php
  $conn = mysqli_connect("sql2.njit.edu", "cp262", "pmq1HTaX", "cp262") or die(mysqli_error());
  //$conn = mysqli_connect("localhost", "id2473271_user", "pass123", "id2473271_animodules") or die(mysqli_error());
  //echo "Database is working!";
  
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST['email'];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_pass = $_POST["confirmpassword"];
  
  $response = array();
  $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."' OR email = '".$email."'");
  $exists = mysqli_num_rows($query);    // if that specific row exists
  
  //$db_user = "";
  
  if($exists > 0)
  {
        $response["success"] = false;
  }
  else {
    $sql = "INSERT INTO user (firstName, lastName, email, username, password, confirm_password) VALUES ('$firstName', '$lastName', '$email', '$username', '$password', '$confirm_pass')";
    
    /*Execute the query*/
    $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    
    $to = $email;
   
      
      $subject = "Welcome to Animodules";
      $message  = "Welcome to Animodules ". $firstName. ",\n";
      $message .= "\n";
      $message .= "Thank you for registering!";
      $message .= "\n";
      $message .= "Your username: ". $username . "\n";
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
        
    $response["success"] = true;
  }
   
  echo(json_encode($response));
?>