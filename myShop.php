<?php
	/*
	Timothy Johnson
	17002289
	WEDE6011
	*/
session_start();

include('inc/DBConn.php'); // $DBConn

require_once("aShopCart.php");

$item_ids = array();

// session_destroy();

// Instantiate cart
$Cart = new ShoppingCart();

// Add to cart
$Cart->addToCart();

// Remove from cart
$Cart->removeFromCart();

// Empty cart
$Cart->emptyCart();

?>

<?php include 'inc/header.php'; ?>

<?php $Cart = new ShoppingCart(); ?>

	<div class="cart" id="cart">
		<h2>Cart</h2>
		<p>Items in your cart.</p>
		<?php $Cart->getCartItems(); ?>
	</div>
	
	<div class="items">
		<h2>Shop Items</h2>
		<p>All items for sale.</p>
		<?php $Cart->getShopItems(); ?>
	</div>


<?php include 'inc/footer.php'; ?>