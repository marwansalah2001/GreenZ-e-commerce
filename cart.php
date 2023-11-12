<?php
require "layout.php";
require_once "connection.php";

if (!isset($_SESSION["userID"])) {

	header('location: index.php');

} else {


	$user_id = $_SESSION['userID'];


	if ($_GET) {

		if (isset($_GET['action']) && $_GET['action'] == "remove") {

			#removing items from databaes

			$cartID = $_GET['cartID'];
			$sql = "delete from cart where id = '$cartID'";
			$res = $connect->query($sql);

		} else {

			#insert cart total price to orders table

			$neworder = "insert into invoice (userID) values ('$user_id')";
			$res = $connect->query($neworder);
			$lastinvoice = $connect->insert_id;

			$cartitems = "select itemID,quantity,price from cart inner join items on itemID=items.id  where userID='$user_id'";

			$cart = $connect->query($cartitems);

			while ($row = $cart->fetch_assoc()) {

				$itemID = $row['itemID'];
				$quantity = $row['quantity'];
				$price = $row['price'];

				$insertitems = "insert into orders (itemID , quantity , invoiceID,price)
          values ('$itemID','$quantity','$lastinvoice','$price')";

				$res = $connect->query($insertitems);

			}


			#empty cart after sending order

			$deltecart = "delete from cart where userID='$user_id' ";
			$res = $connect->query($deltecart);




		}
	}
	?>
	<!DOCTYPE html>
	<html lang="en">



	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread"><span style="color:#28a745;">


							<?php
							$stmnt = "select name from users where id = '$user_id'";
							$res = $connect->query($stmnt);
							$name = $res->fetch_assoc()["name"];

							echo $name;

							?>
						</span> Cart</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$sql = "select c.id as cid,i.name,i.price,i.imgPath,c.quantity from cart as c inner join items as i on i.id=c.itemID
							 where userID='$user_id' ";
								$result = $connect->query($sql);
								$total_price = 0;
								while ($row = $result->fetch_assoc()) {

									?>
									<tr class="text-center">
										<td class="product-remove"><a
												href="cart.php?action=remove&cartID=<?php echo $row['cid'] ?>"><i
													class="fas fa-times"></i></a></td>

										<td class="image-prod">
											<div class="img"
												style="background-image:url(images/<?php echo $row['imgPath'] ?>);"></div>
										</td>

										<td class="product-name">
											<h3>
												<?php echo $row['name'] ?>
											</h3>

										</td>

										<td class="price">
											<?php echo $row['price'] ?>
										</td>

										<td class="quantity">
											<?php echo $row['quantity'] ?>
										</td>

										<td class="total">
											<?php echo $row['price'] * $row['quantity'] ?>
										</td>
									</tr>


									<?php
									$total_price += $row['price'] * $row['quantity'];

								} ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">

				<div class="col-lg-4 mt-5 cart-wrap">
					<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
						<p class="d-flex">
							<span>Subtotal</span>
							<span>
								<?php echo $total_price ?>
							</span>
						</p>
						<p class="d-flex">
							<span>Fees</span>
							<span>
								<?php echo $total_price * 0.14 ?>
							</span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<span>
								<?php echo $total_price + $total_price * 0.14 ?>
							</span>
						</p>
					</div>
					<p><a href="cart.php?action = confirm" class="btn btn-primary py-3 px-4">Place order</a></p>
				</div>
			</div>
		</div>
	</section>


	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>

	</html>

<?php } ?>