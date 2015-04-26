<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); 
$contact_username=$_GET["contact_username"];
$contact_id=$_GET["contact_user_id"];
//your user_id and username is stored in session
$contacts_with_username=$_SESSION["username"];
$contacts_with_id=$_SESSION["user_id"];

// Perform Create

      //create contacts correlation
    $query  = "INSERT INTO contacts (";
    $query .= "  contact_id, contact_username, contacts_with_id, contacts_with_username ";
    $query .= ") VALUES (";
    $query .= "  {$contact_id}, '{$contact_username}', {$contacts_with_id}, '{$contacts_with_username}'";
    $query .= ") ";
    $new_contact_created = mysqli_query($connection, $query);

    if ($new_contact_created) {         
    // Success
      $_SESSION["message"] = "You have added a new friend!";
      redirect_to("profile.php?user_id={$contact_id}");   
    } else {
      // Failure
      $_SESSION["message"] = "could not add friend";
        redirect_to("profile.php?user_id={$contact_id}");
    }
?>
<?php include("../includes/layouts/footer.php"); ?>