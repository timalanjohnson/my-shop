<?php session_start(); ?>
<?php session_destroy(); ?>
<?php include("inc/header.php"); ?>

	<h2>You are logged out.</h2>

	<p><a href="myShop.php" class="btn btn-primary">Shop</a>

<a href="admin.php" class="btn btn-danger">Admin Login</a></p>

<?php include("inc/footer.php"); ?>