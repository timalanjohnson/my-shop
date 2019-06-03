<?php
	/*
	Timothy Johnson
	17002289
	WEDE6011
	*/
	
	class ShoppingCart
	{

		public function __construct(){
			// echo "<p> I am in construct.</p>";
		}

		public function getAdminItems(){
			include('inc/DBConn.php'); // $DBConn

			$query = "SELECT * FROM tbl_item ORDER BY id ASC";
			$result = mysqli_query($DBConn, $query);

			echo '
				<table class="table" id="items">
					<tr>
						<th></th>
						<th width="15%">Name</th>
						<th width="20%">Description</th>
						<th class="right">Cost Price</th>
						<th class="right">Sell Price</th>
						<th class="right">Quantity</th>
						<th width="20%">Actions</th>
					</tr>
			';

			if (mysqli_num_rows($result) > 0)
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					// Table row
					echo '<form method="POST" action="myShop.php?action=add&id='.$row["id"].'">
							<tr>
								<!-- Thumbnail -->
								<td><img class="table-thumbnail" src="images/lenses/'.$row["name"].'.jpg" /></td>
									
								<!-- DName -->
								<td><input class="form-control quantity-input" type="text" name="name" value="'.$row["name"].'"></td>

								<!-- Description -->
								<td><input class="form-control quantity-input" type="text" name="description" value="'.$row["description"].'"></td>
								
								<!-- Price -->
								<td><input class="form-control quantity-input" type="text" name="cost_price" value="'.$row["cost_price"].'"></td>

								<!-- Price -->
								<td><input class="form-control quantity-input" type="text" name="sell_price" value="'.$row["sell_price"].'"></td>

								<!-- Quantity -->
								<td align="right"><input type="text" name="quantity" class="form-control quantity-input" value="'.$row["quantity"].'"></td>
								
								<!-- Hidden inputs -->
								<input type="hidden" name="id" value="'.$row["id"].'">
								
								<!-- Actions -->
								<td align="right">
									<input type="submit" name="updateItemBtn" class="btn btn-secondary add-to-cart" value="Update">
									<input type="submit" name="deleteItemBtn" class="btn btn-danger add-to-cart" value="Delete">
								</td>
							</tr>
						</form>
					';
				}
			}

			echo '<form method="POST" action="myShop.php?action=addNew">
							<tr>
								<!-- Thumbnail -->
								<td></td>
									
								<!-- DName -->
								<td><input class="form-control quantity-input" type="text" name="name" value="Name"></td>

								<!-- Description -->
								<td><input class="form-control quantity-input" type="text" name="description" value="Description"></td>
								
								<!-- Price -->
								<td><input class="form-control quantity-input" type="text" name="cost_price" value="Cost Price"></td>
								
								<!-- Price -->
								<td><input class="form-control quantity-input" type="text" name="sell_price" value="Sell Price"></td>

								<!-- Quantity -->
								<td align="right"><input type="text" name="quantity" class="form-control quantity-input" value="Quantity"></td>
								
								<!-- Add to Cart -->
								<td align="right">
									<input type="submit" name="newItemBtn" class="btn btn-primary add-to-cart" value="Add New Item">
								</td>
							</tr>
						</form>
					';

			echo '</table>';
		}

		public function getShopItems(){

			include('inc/DBConn.php'); // $DBConn

			$query = "SELECT * FROM tbl_item ORDER BY id ASC";
			$result = mysqli_query($DBConn, $query);

			echo '
				<table class="table">
					<tr>
						<th></th>
						<th>Product</th>
						<th class="right">Price</th>
						<th class="right">Quantity</th>
						<th></th>
					</tr>
			';

			if (mysqli_num_rows($result) > 0)
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					// Table row
					echo '<form method="POST" action="myShop.php?action=add&id='.$row["id"].'">
							<tr>
								<!-- Thumbnail -->
								<td><img class="table-thumbnail" src="images/lenses/'.$row["name"].'.jpg" /></td>
									
								<!-- Description/name -->
								<td>'.$row["description"].'</td>
								
								<!-- Price -->
								<td>'.number_format($row["sell_price"], 2).'</td>
								
								<!-- Quantity -->
								<td width="10%" align="right"><input type="text" name="quantity" class="form-control quantity-input" value="1"></td>
								
								<!-- Hidden inputs -->
								<input type="hidden" name="id" value="'.$row["id"].'">
								<input type="hidden" name="description" value="'.$row["description"].'">
								<input type="hidden" name="price" value="'.$row["sell_price"].'">
								
								<!-- Add to Cart -->
								<td align="right"><input type="submit" name="add_to_cart" class="btn btn-primary add-to-cart" value="Add to Cart"></td>
							</tr>
						</form>
					';
				}
			}

			echo '</table>';
		}

		public function getCartItems(){

			echo '
				<table class="table">
					<tr>
						<th>Product</th>
						<th class="right">Quantity</th>
						<th class="right">Price</th>
						<th class="right">Total</th>
						<th class="right">Action</th>
					</tr>
			';

			$total = 0;
			if (!empty($_SESSION["shopping_cart"])) {
				
				foreach ($_SESSION["shopping_cart"] as $key => $item) {
					echo '
					<tr>
						<td>'.$item["description"].'</td>
						<td align="right">'.$item["quantity"].'</td>
						<td align="right">$'.number_format($item["price"], 2).'</td>
						<td align="right">$'.number_format($item["quantity"] * $item["price"], 2).'</td>
						<td align="right">
							<a class="btn btn-danger" href="myShop.php?action=delete&id='.$item["id"].'">
								Remove
							</a>
						</td>
					</tr>';

					$total = $total + ($item["quantity"] * $item["price"]);
				}

					echo '
					<tr>
						<td align="right" colspan="3">Total</td>
						<td align="right"><strong>$'.number_format($total, 2).'</strong></td>
						<td align="right">
							<a href="checkout.php" class="btn btn-primary">Checkout</a>
							<a href="myShop.php?action=empty" class="btn btn-danger">Empty Cart</a>
						</td>
					</tr>';
			}

			echo '</table>';
		}

		public function checkout(){

			echo '
				<table class="table">
					<tr>
						<th>Product</th>
						<th class="right">Quantity</th>
						<th class="right">Price</th>
						<th class="right">Total</th>
						<th class="right">Action</th>
					</tr>
			';

			$total = 0;
			if (!empty($_SESSION["shopping_cart"])) {
				
				foreach ($_SESSION["shopping_cart"] as $key => $item) {
					echo '
					<tr>
						<td>'.$item["description"].'</td>
						<td align="right">'.$item["quantity"].'</td>
						<td align="right">$'.number_format($item["price"], 2).'</td>
						<td align="right">$'.number_format($item["quantity"] * $item["price"], 2).'</td>
						<td align="right">
							<a class="btn btn-danger" href="myShop.php?action=delete&id='.$item["id"].'">
								Remove
							</a>
						</td>
					</tr>';

					$total = $total + ($item["quantity"] * $item["price"]);
				}

					echo '
					<tr>
						<td align="right" colspan="3">Total</td>
						<td align="right"><strong>$'.number_format($total, 2).'</strong></td>
						<td align="right">
							<a href="order.php" class="btn btn-primary">Buy</a>
							<a href="myShop.php?action=empty" class="btn btn-danger">Empty Cart</a>
						</td>
					</tr>';
			}

			echo '</table>';
		}

		public function addToCart(){

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
		}

		public function removeFromCart(){

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
		}

		public function emptyCart(){

			if (filter_input(INPUT_GET, 'action') == 'empty') {
				unset($_SESSION['shopping_cart']);
			}
		}

		public function newOrder(){

			include('inc/DBConn.php'); // $DBConn

			$ordernumber = mt_rand(1000000000000000,9999999999999999);

			$sql = "
				INSERT INTO tbl_order (id, order_date, tbl_customer_id)
				VALUES (NULL, NOW(), 1)
			";

			if (mysqli_query($DBConn, $sql)) {
			    echo "<h2>You're order has been placed successfully.</h2>";	
			    echo "<p>You're order number is ". $ordernumber .".</p>";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($DBConn);
			}
		}

		public function newItem(){

			include('inc/DBConn.php'); // $DBConn

			$sql = "
				INSERT INTO tbl_item (id, name, description, sell_price, cost_price, quantity)
				VALUES (NULL, 'New Name', 'New Description', 500, 350, 10)
			";

			if (mysqli_query($DBConn, $sql)) {
			    echo "<p>Item added successfully.</p>";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($DBConn);
			}
		}
	}
?>