<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php");
$contact_username=$_GET["contact_username"];
$contact_id=$_GET["contact_user_id"];
//your user_id and username is stored in session
$contacts_with_username=$_SESSION["username"];
$contacts_with_id=$_SESSION["user_id"];
//create contacts correlation
    $query  = "DELETE FROM contacts WHERE contact_id ={$contact_id}";
    $query .= " AND contacts_with_id ={$contacts_with_id} LIMIT 1";
    $contact_removed = mysqli_query($connection, $query);
    if ($contact_removed) {               
    // Success
      $_SESSION["message"] = "This contact has been removed.";
      //redirect_to("profile.php?user_id={$user_id}");
      redirect_to("profile.php?user_id={$contact_id}");
        
    } else {
      // Failure
      $_SESSION["message"] = "could not remove friend";
    }
?>
<?php include("../includes/layouts/footer.php"); ?>