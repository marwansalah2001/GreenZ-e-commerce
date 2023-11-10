<!DOCTYPE html>
<html lang="en">

<head>
	<title>GreenZ</title>
	<meta charset="utf-8">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link rel="stylesheet" href="css//style.css">

</head>

<body class="goto-here">

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">GreenZ</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
					<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><i
								class="fas fa-shopping-cart"></i>[0]</a></li>

				</ul>
			</div>
		</div>
	</nav>

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
								<tr class="text-center">
									<td class="product-remove"><a href="#"><i class="fas fa-times"></i></a></td>

									<td class="image-prod">
										<div class="img" style="background-image:url(images/product-3.jpg);"></div>
									</td>

									<td class="product-name">
										<h3>Bell Pepper</h3>

									</td>

									<td class="price">$4.90</td>

									<td class="quantity">1</td>

									<td class="total">$4.90</td>
								</tr><!-- END TR-->

								<tr class="text-center">
									<td class="product-remove"><a href="#"><i class="fas fa-times" ></i></a></td>

									<td class="image-prod">
										<div class="img" style="background-image:url(images/product-4.jpg);"></div>
									</td>

									<td class="product-name">
										<h3>Bell Pepper</h3>

									</td>

									<td class="price">$15.70</td>

									<td class="quantity">1</td>

									<td class="total">$15.70</td>
								</tr><!-- END TR-->
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