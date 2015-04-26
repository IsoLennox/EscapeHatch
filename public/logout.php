<?php require_once("../includes/session.php"); require_once("../includes/functions.php");
$_SESSION["user_id"] = null;
$_SESSION["username"] = null;
redirect_to("login.php");
?>