<?php 

session_start(); 

require_once("aShopCart.php");
$Cart = new ShoppingCart();

include("inc/header.php"); 

$Cart->newOrder(); ?>

	<p><a href="myShop.php?action=empty">Continue shopping</a>.</p>

<?php session_destroy(); ?>

<?php include("inc/footer.php"); ?>