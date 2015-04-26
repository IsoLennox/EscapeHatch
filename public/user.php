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
      
    
    <p>User.php: Will be used for Notifications</p>

  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>