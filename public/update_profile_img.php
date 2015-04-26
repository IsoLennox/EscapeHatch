<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); confirm_logged_in();
$image_path = $_GET["image_path"];
$image_id = $_GET["image_id"];
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
            
$img_query  = "UPDATE users SET profile_img ='{$image_path}' WHERE id = {$user_id} LIMIT 1";
$img_release  = "UPDATE gallery SET pi =0 WHERE user_id = {$user_id}";
$img_update  = "UPDATE gallery SET pi =1 WHERE id = {$image_id} LIMIT 1";



$image_set = mysqli_query($connection, $img_query);
$image_released = mysqli_query($connection, $img_release);
$image_updated = mysqli_query($connection, $img_update);



if ($image_set && $image_updated && mysqli_affected_rows($connection) == 1) {
          // Success
          $_SESSION["message"] = "Profile Image SUCCESSFUL!";
          redirect_to("profile.php?user_id={$_SESSION["user_id"]}");
        } else {
          // Failure
          $_SESSION["message"] = "Image not saved.";
    redirect_to("profile.php?user_id={$_SESSION["user_id"]}");
        }


?>