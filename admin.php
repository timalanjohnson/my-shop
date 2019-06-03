<?php
	/*
	Timothy Johnson
	17002289
	WEDE6011
	*/

include('inc/header.php');
include('inc/DBConn.php'); // $DBConn
require_once("aShopCart.php");
$Cart = new ShoppingCart();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Email and password from form
	$UserData = $_POST['userData'];
	$UserData['email'] = $_POST['userData']['email'];
	$UserData['password'] = $_POST['userData']['password'];

	$email = $UserData['email'];
	$password = $UserData['password'];
	$hash = md5($password);
	$error = "";

	$sql = "SELECT ID FROM tbl_customer WHERE email = 'mp@whu.com' AND password = '".$password."'";
	$result = mysqli_query($DBConn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);	

	$count = mysqli_num_rows($result);

	if ($UserData['email'] == 'mp@whu.com') {
		// echo '<a href="items.php"><button>Click here to view items</button></a>';
		$Cart->getAdminItems();
	} else {
		echo "Your email or password is invalid.";
	}
}

?>

<div class="login-form" id="login-form">
	
	<h2>Log in</h2>

	<form method="POST" action="">
		
		<label>Email</label>
		<input class="form-control" type="email" name="userData[email]" value="<?php echo isset($_POST['userData']['email']) ? $_POST['userData']['email'] : '' ?>">
		
		<div class="spacer"></div>
		
		<label>Password</label>
		<input class="form-control" type="password" name="userData[password]" value="<?php echo isset($_POST['userData']['password']) ? $_POST['userData']['password'] : '' ?>">

		<div class="spacer"></div>

		<button class="btn btn-primary" type="submit" name="submit" value="">Log in</button>
	</form>

	<p style="text-align: center; margin-bottom: 48px;"><a id="forgotPassword" href="#">Forgot password?</a> | New user? <a href="signup.php">Sign up!</a></p>
</div>

<?php include('inc/footer.php'); ?>
