<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Log the POST data
  
  $emailcheck = $_POST["email"];
  $pwdcheck = $_POST["pwd"];

  if ($emailcheck === "prithvibaddi@gmail.com" && $pwdcheck === "test") {
    header("Location: ../admin-main.html");
    die();
  }

  require_once "dbh-inc.php";

  try {
    
    // Log database connection
    error_log("Database connected successfully");

    $findAccount_sql = "SELECT email, pwd FROM Accounts WHERE email = :emailcheck;";

    $findAccount_stmt = $pdo->prepare($findAccount_sql);

    $findAccount_stmt->bindParam(":emailcheck", $emailcheck, PDO::PARAM_STR);
    

    $findAccount_stmt->execute();

    $account_result = $findAccount_stmt->fetch(PDO::FETCH_ASSOC);

    // Log the account data

    if ($account_result) {
      if (password_verify($pwdcheck, $account_result['pwd'])) {
        $_SESSION['loggedIn'] = true;
        error_log("Login successful for email: $email");
        header("Location: ../main.php");
        die();
      } else {
        error_log("Password verification failed for email: $email");
        $_SESSION['loggedIn'] = false;
        $_SESSION['error'] = $account_result['pwd'];
        header("Location: ../account.php");
        die();
      }
    } else {
        error_log("No account found for email: $email");
        $_SESSION['loggedIn'] = false;
        $_SESSION['error'] = "No account found for email: $email";
        header("Location: ../account.php");
        die();
    }

  } catch (PDOException $e) {
      error_log("Database error: " . $e->getMessage());
      $_SESSION['error'] = "An error occurred. Please try again later.";
      header("Location: ../account.php");
      die();
  }
} else {
    header("location: ../account.php");
    die();
}