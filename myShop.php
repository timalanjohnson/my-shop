<?php
	/*
	Timothy Johnson
	17002289
	WEDE6011
	*/

include_once('inc/DBConn.php'); // $DBConn

session_start();

$item_ids = array();

// session_destroy();

// Check if add to cart has been submitted
if (filter_input(INPUT_POST, 'add_to_cart')) {

	if (isset($_SESSION['shopping_cart'])) {

		// Keep count of number of products in the cart
		$count = count($_SESSION['shopping_cart']);

		// Create array for matching array keys to item ids
		$item_ids = array_column($_SESSION['shopping_cart'], 'id');

		if (!in_array(filter_input(INPUT_GET, 'id'), $item_ids)) {	

			$_SESSION['shopping_cart'][$count] = array 
			(
				'id' => filter_input(INPUT_GET, 'id'),
				'description' => filter_input(INPUT_POST, 'description'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
			);

		}
		else {
			// Match array key to id of the product being added to the cart
			for ($i=0; $i < count($item_ids); $i++) { 
				if ($item_ids[$i] == filter_input(INPUT_GET, 'id')) {
					// Add item quantity to the existing item in the array
					$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
				}
			}
		}

	}
	else {

		$_SESSION['shopping_cart'][0] = array 
		(
			'id' => filter_input(INPUT_GET, 'id'),
			'description' => filter_input(INPUT_POST, 'description'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
		);

	}
}

if (filter_input(INPUT_GET, 'action') == 'delete') {
	foreach ($_SESSION['shopping_cart'] as $key => $item) {
		if ($item['id'] == filter_input(INPUT_GET, 'id')) {
			// Remove product from cart
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
	// Reset session array keys
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

function pre_r($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

?>

<?php include 'inc/header.php'; ?>
	
	<div class="items">

		<h2>Shop Items</h2>

		<p>All items for sale.</p>

		<table class="table">
			<tr>
				<th></th>
				<th>Product</th>
				<th class="right">Price</th>
				<th class="right">Quantity</th>
				<th></th>
			</tr>
			<?php 
			
			$query = "SELECT * FROM tbl_item ORDER BY id ASC";
			
			$result = mysqli_query($DBConn, $query);
			
			if (mysqli_num_rows($result) > 0)
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					// Table row
					?>
					<form method="POST" action="myShop.php?action=add&id=<?php echo $row["id"]; ?>">
						<tr>
							<!-- Thumbnail -->
							<td><img class="table-thumbnail" src="images/lenses/<?php echo $row["name"]; ?>.jpg" /></td>
							
							<!-- Description/name -->
							<td><?php echo $row["description"]; ?></td>
							
							<!-- Price -->
							<td align="right">$<?php echo number_format($row["sell_price"], 2); ?></td>
							
							<!-- Quantity -->
							<td width="10%" align="right"><input type="text" name="quantity" class="form-control quantity-input" value="1"></td>

							<!-- Hidden inputs -->
							<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
							<input type="hidden" name="description" value="<?php echo $row["description"] ?>">
							<input type="hidden" name="price" value="<?php echo $row["sell_price"] ?>">
							
							<!-- Add to Cart -->
							<td align="right"><input type="submit" name="add_to_cart" class="btn btn-primary add-to-cart" value="Add to Cart"></td>
						</tr>					
					</form>
					<?php
				}
			}
			?>
		</table>
			
	</div>

	<div class="cart" id="cart">
		<h2>Cart</h2>
		<p>Items in your cart.</p>
		<table class="table">			
			<tr>
				<th>Product</th>
				<th class="right">Quantity</th>
				<th class="right">Price</th>
				<th class="right">Total</th>
				<th class="right">Action</th>
			</tr>
			<?php
				$total = 0;	
			if (!empty($_SESSION['shopping_cart'])) {
				$total = 0;
				foreach ($_SESSION['shopping_cart'] as $key => $item) {
					?>
					<tr>
						<td><?php echo $item['description']; ?></td>
						<td align="right"><?php echo $item['quantity']; ?></td>
						<td align="right">$<?php echo number_format($item['price'], 2); ?></td>
						<td align="right">$<?php echo number_format($item['quantity'] * $item['price'], 2); ?></td>
						<td align="right">
							<a class="btn btn-danger" href="myShop.php?action=delete&id=<?php echo $item['id']; ?>">
								Remove
							</a>
						</td>
					</tr>
					<?php
					$total = $total + ($item['quantity'] * $item['price']);
				}
			}
			?>
			<tr>
				<td align="right" colspan="3">Total</td>
				<td align="right"><strong>$<?php echo number_format($total, 2); ?></strong></td>
				<td align="right">
					<?php 
						if (isset($_SESSION['shopping_cart'])) {
							if (count($_SESSION['shopping_cart']) > 0) {
								?>
									<a href="#" class="btn btn-primary">Checkout</a>
								<?php 
							}
						}
					?>
				</td>
			</tr>
		</table>

		<?php // Used for debugging shopping cart pre_r($_SESSION);	?>
	</div>

<?php include 'inc/footer.php'; ?>