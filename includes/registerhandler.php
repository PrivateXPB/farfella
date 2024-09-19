<?php

session_start();





if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  
  $first_name = htmlspecialchars($_POST["first_name"]);
  $last_name = htmlspecialchars($_POST["last_name"]);
  $email = htmlspecialchars($_POST["email"]);
  $pwd = htmlspecialchars($_POST["pwd"]);
  $confirmpwd = htmlspecialchars($_POST["confirmpwd"]);
  

  if(empty($first_name) || empty($last_name) || empty($email) || empty($pwd) || empty($confirmpwd)) {
    
    header("location: ../register.php");
    echo "<h1>Enter all data</h1>";
    die();
  } else {
    if ($pwd !== $confirmpwd) {

      header("location: ../register.php");
      echo "<h2>Repeat the correct password</h2>";
      die();

    } else {

      require_once "dbh-inc.php";

      try {
      

        // Prepare the SQL statement
        $emailCheck_sql = "SELECT COUNT(*) FROM Accounts WHERE email = :email";
        $emailCheck_stmt = $pdo->prepare($emailCheck_sql);
        
        // Bind the email parameter
        $emailCheck_stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        // Execute the statement
        $emailCheck_stmt->execute();
        
        // Fetch the result
        $count = $emailCheck_stmt->fetchColumn();
  
        
        $emailCheck_stmt = null;
        
        if ($count > 0) {
            // Email already exists in the database
            header("location: ../register.php");
            echo "<h3>This email is already registered. Please use a different email or try logging in.</h3>";
            die();
        } else {
          // Email is not registered, proceed with registration
          
          $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);
            
        
          $registerNewUser_sql = "INSERT INTO Accounts (email, first_name, last_name, pwd) VALUES (:email, :first_name, :last_name, :pwd);";
      
          $registerNewUser_stmt = $pdo->prepare($registerNewUser_sql);
      
          $registerNewUser_stmt->bindParam(":email", $email);
          $registerNewUser_stmt->bindParam(":first_name", $first_name);
          $registerNewUser_stmt->bindParam(":last_name", $last_name);
          $registerNewUser_stmt->bindParam(":pwd", $hashed_pwd);
      
          $registerNewUser_stmt->execute();
      
          $pdo = null;
          $registerNewUser_stmt = null;
      
          header("location: ../main.html");

          $_SESSION['user_logged_in'] = true;
      
          die();
          
            
        }
      } catch (PDOException $e) {
        // Handle any errors
        die("Query Failed: ".$e->getMessage());
      }
    }
    

  }

  

} else {
  header("location: ../register.php");
}


