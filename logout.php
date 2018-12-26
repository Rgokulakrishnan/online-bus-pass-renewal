<a href="signin.php">signin</a><?php

session_start();

ob_start();



//unset($_SESSION["id"]);

unset($_SESSION["id"]);
session_destroy($_SESSION['id']);


$_SESSION["login_session_msg"] = "You are logged out Successfully";

echo $_SESSION["login_session_msg"];

header("location:welcome.html");


?>