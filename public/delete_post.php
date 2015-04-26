<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
  $current_post=$_GET["post_id"];
  $query = "DELETE FROM blog_posts WHERE post_id = {$current_post} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Post deleted.";
    redirect_to("blog.php?user_id={$_SESSION["user_id"]}");
  } else {
    // Failure
    $_SESSION["message"] = "Post deletion failed.";
    redirect_to("blog.php?user_id={$_SESSION["user_id"]}");
  }
?>