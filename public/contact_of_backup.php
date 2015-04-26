<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?> 
<?php require_once("../includes/db_connection.php"); ?>
<?php confirm_logged_in(); ?> 
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
    
  <div id="navigation">
     
      <?php include("../includes/layouts/nav.php"); ?>
  </div><!-- end nav-->
  <div id="page">
      
       <?php echo message(); ?>
      
      
 
      <h2>Following You</h2>
      
      
 
      <hr/>
    
        <ul>
        <?php 
 //TO DO:

//check to see if you are following who is following you, give option to add friend if !





// 1. FIND ALL CONTACTS WITH YOUR ID AS A CONTACTS ID (added YOU as friend)
$query = "SELECT * FROM contacts WHERE contact_id = {$_SESSION["user_id"]}";
$result = mysqli_query($connection, $query);
$contacts_array=mysqli_fetch_assoc($result);
//$num_profiles_found = count($result);
//iterate over all the rows
if(empty($contacts_array)){
    echo "No one has added you! ";
    echo "<br/>";  
    
    
}else {
    
    // 2. if contacts have YOU as a contacts_with_id, show them here
    
    //check to see if user is your friend, for add option
    $contact_id=$contacts_array["contacts_with_id"];
   $check_if_contact=see_if_user_is_your_contact($contact_id);
    $if_contact_array=mysqli_fetch_assoc($check_if_contact);
    
    if(empty($if_contact_array)){
        echo "not following this user";
        $action="+ Add Contact";
    }else{
        echo "You are following this user";
        $action="- Remove Contact";    
    }
    
    
    
    
    
        //first one gets caught in array limbo, echo out array 
    
    echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
    echo htmlentities($contacts_array["contacts_with_username"]);
echo "</div><br/>";
    echo "View Profile: <a href='profile.php?user_id=";
    echo urlencode($contacts_array["contacts_with_id"]);
    echo "'>";
    echo htmlentities($contacts_array["contacts_with_username"]);
    echo "</a><br/>"; 
    echo $action;
    echo "</div><br/><br/>";
    
 
while($contact = mysqli_fetch_assoc($result)){
    
    //This one does not work. Test to use function instead to eliminate limbo user
// 
//        //check to see if user is your friend, for add option
//    //$contact_id=$contacts_array["contacts_with_id"];
//   $check_if_contact=find_your_contacts();
//    $if_contact_array=mysqli_fetch_assoc($check_if_contact);
//    
//    if(empty($if_contact_array)){
//        echo "not following";
//        $action="+ Add Contact";
//    }elseif(!empty($if_contact_array)){
//        echo "You are following this user";
//        $action="- Remove Contact";    
//    }
//    
 
    
    echo "<div id=\"post-wrap\"><div id=\"post-title\">"; 
    echo htmlentities($contact["contacts_with_username"]);
echo "</div><br/>";
    echo "View Profile: <a href='profile.php?user_id=";
    echo urlencode($contact["contacts_with_id"]);
    echo "'>";
    echo htmlentities($contact["contacts_with_username"]);
    echo "</a><br/>"; 
     echo $action;
    echo "</div><br/><br/>";

    
    }//end iterate through contacts
}//end see if user has contacts
                             
        ?>
        </ul>      
      </div>
  </div> 
<?php include("../includes/layouts/footer.php"); ?>