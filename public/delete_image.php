<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
  $image_id=$_GET["image_id"];
  $query = "DELETE FROM gallery WHERE id = {$image_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Image deleted.";
    redirect_to("gallery.php?user_id={$_SESSION["user_id"]}");
  } else {
    // Failure
    $_SESSION["message"] = "Image deletion failed.";
    redirect_to("gallery.php?user_id={$_SESSION["user_id"]}");
  }
?>