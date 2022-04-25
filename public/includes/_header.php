<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$page = $_SERVER['PHP_SELF'];
$sec = "600";

?>
