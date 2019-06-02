<?php
	/*
	Timothy Johnson
	17002289
	WEDE6011
	*/

session_start();

include_once('inc/DBConn.php'); // $DBConn

?>

<?php include 'inc/header.php'; ?>

	<table class="table">
		<tr>
			<th class="hidden">ID</th>
			<th>NAME</th>
			<th>DESCRIPTION</th>
			<th>PRICE</th>
			<th>QUANTITY</th>
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
						<td>$<?php echo $row["sell_price"]; ?></td>
						
						<!-- Quantity -->
						<td><input type="text" name="quantity" class="form-control quantity-input" value="1"></td>

						<!-- Hidden inputs -->
						<input type="hidden" name="id" value="<?php $row["id"] ?>">
						<input type="hidden" name="description" value="<?php $row["description"] ?>">
						<input type="hidden" name="price" value="<?php $row["sell_price"] ?>">
						
						<!-- Add to Cart -->
						<td><input type="submit" name="addToCart" class="btn btn-primary add-to-cart" value="Add to Cart"></td>
					</tr>					
				</form>
				<?php
			}
		}


		?>
	</table>

<?php include 'inc/footer.php'; ?>