<?php
  $conn = mysqli_connect("sql2.njit.edu", "cp262", "pmq1HTaX", "cp262") or die(mysqli_error());
  //$conn = mysqli_connect("localhost", "id2473271_user", "pass123", "id2473271_animodules") or die(mysqli_error());
  //echo "Database is working!";
  
  $username = $_POST["username"];  // what the user enters in login for username
  $password = $_POST["password"];  // what the user enters in login for password
  //$username = "chirayu";
  //$password = "pass";
  $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'");
  $exists = mysqli_num_rows($query);    // if that specific row exists
  
  //$db_user = "";
  //$db_pass = "";
  $response = array();
  $response["success"] = false;
  
  
  if($exists > 0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            $db_user = $row['username'];
            $db_pass = $row['password'];
            $db_email = $row['email'];
            $fName = $row['firstName'];
            $lName = $row['lastName'];
            $confirmPass = $row['confirm_password'];
        }
        
        if(($username == "") || ($password == "")){
            $response["success"] = false;
        }
        else if(($username == $db_user) && ($password == $db_pass))
        {
          $response["success"] = true;
          $response["username"] = $username;
          $response["password"] = $password;
          $response['email'] = $db_email;
          $response["password_confirm"] = $confirmPass;
          $response["firstName"] = $fName;
          $response["lastName"] = $lName;
        }
        
        
        
    }
  echo json_encode($response);
?>