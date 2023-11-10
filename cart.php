<?php
require_once "layout.php";
require_once "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">



<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
				<h1 class="mb-0 bread">My Cart</h1>
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
							$sql = "select c.id,i.name,i.price,i.imgPath,c.quantity from cart as c inner join items as i on i.id=c.itemID ";
							$result = $connect->query($sql);
							while ($row = $result->fetch_assoc()) {

								?>
								<tr class="text-center">
									<td class="product-remove"><a href="#"><i class="fas fa-times"></i></a></td>

									<td class="image-prod">
										<div class="img" style="background-image:url(images/<?php echo $row['imgPath'] ?>);"></div>
									</td>

									<td class="product-name">
										<h3><?php echo $row['name'] ?></h3>

									</td>

									<td class="price"><?php echo $row['price'] ?></td>

									<td class="quantity"><?php echo $row['quantity'] ?></td>

									<td class="total"><?php echo $row['price']* $row['quantity'] ?></td>
								</tr>

							<?php } ?>


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
						<span>$20.60</span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>$0.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>$20.60</span>
					</p>
				</div>
				<p><a href="checkout.php" class="btn btn-primary py-3 px-4">Place order</a></p>
			</div>
		</div>
	</div>
</section>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>