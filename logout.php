<?php 
// membersihkan session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

?>