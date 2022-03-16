<?php
//prevent direct url access
if (isset($_POST["submit"])) {
  // Connection string
  $servername = $_POST["server"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $dbname = $_POST["database"];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    header("Location: ../error.php");
    exit();
  } else {
    //sesija
    session_start();
    $_SESSION['authenticated'] = true;
    $_SESSION["server"] = $servername;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $_SESSION['dbname'] = $dbname;
    header("location: ../crud.php");
    exit();
  }
  $conn->close();
} else {
  //vrati na login
  header("Location: ../error.php");
  exit();
}
