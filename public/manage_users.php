<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php

//finds and lists ALL users, with option to edit and delete
  $user_set = find_all_users();
?>

<?php $layout_context = "user"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
    <a href="index.php">&laquo; Main menu</a><br />
  </div>
  <div id="page">
    <?php echo message(); ?>
    <h2>Manage users</h2>
    <table>
      <tr>
        <th style="text-align: left; width: 200px;">Username</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($user = mysqli_fetch_assoc($user_set)) { ?>
      <tr>
        <td><?php echo htmlentities($user["username"]); ?><br/>
          <?php //echo htmlentities($user["password"]); ?></td>
          
         <?php if($user["id"] === $_SESSION["user_id"]){ ?>
        <td><a href="edit_user.php?id=<?php echo urlencode($user["id"]); ?>">Edit Settings</a> | </td> 
        <td><a href="delete_user.php?id=<?php echo urlencode($user["id"]); ?>" onclick="return confirm('Are you sure?');">Delete Account</a></td>
          <?php } ?>
      </tr>
    <?php } ?>
    </table>
    <br />
    
 
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>