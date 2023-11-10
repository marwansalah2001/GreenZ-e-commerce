<?php
require_once 'connection.php';
session_start();
if ($_GET) {

	$itemId = $_GET['itemID'];
	$userId = $_SESSION['userID'];

	$select = "select * from cart where userID='$userId' and itemID='$itemId' ";

	$res = $connect->query($select);

	if ($res->num_rows > 0) {

		$update = "update cart set quantity=quantity+1 where userID='$userId' and itemID='$itemId' ";
		$res = $connect->query($update);


	} else {
		$insert = "insert into cart (userID,itemID,quantity) values ('$userId','$itemId',1)";
		$res = $connect->query($insert);
	}
}

?>

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
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span>
					</p>
					<h1 class="mb-0 bread">Products</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 mb-5 text-center">
					<ul class="product-category">
						<li><a href="#" class="active">All</a></li>
						<li><a href="#">Vegetables</a></li>
						<li><a href="#">Fruits</a></li>
						<li><a href="#">Juice</a></li>
						<li><a href="#">Dried</a></li>
					</ul>
				</div>
			</div>
			<div class="row">

				<?php
				$selectOffer = "select * from items";
				$res = $connect->query($selectOffer);

				while ($row = $res->fetch_assoc()) {



					?>
					<div class="col-md-6 col-lg-3">
						<div class="product">
							<a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $row['imgPath'] ?>"
									alt="Colorlib Template">

								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#">
										<?php echo $row['name'] ?>
									</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span>
												<?php echo $row['price'] ?>
											</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">

										<span><a class="buy-now d-flex justify-content-center align-items-center mx-1"
												href="index.php?itemID=<?php echo $row['id'] ?>"><i
													class="fas fa-shopping-cart"></i></a></span>

									</div>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>

			</div>
		</div>
	</section>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>