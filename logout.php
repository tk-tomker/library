
?><?php
session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to the main page
header("Location: mainpage.php");
exit();
?>