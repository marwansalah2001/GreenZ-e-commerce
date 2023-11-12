<?php

require 'layout.php';

require_once 'connection.php';

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





<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 text-center">
						<h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
						<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
						<p><a href="#" class="btn btn-primary">View Details</a></p>
					</div>

				</div>
			</div>
		</div>




		<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 text-center">
						<h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
						<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
						<p><a href="#" class="btn btn-primary">View Details</a></p>
					</div>

				</div>
			</div>
		</div>




		<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 text-center">
						<h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
						<h2 class="subheading mb-4">vegetables &amp; fruits</h2>
						<p><a href="#" class="btn btn-primWe deliver organic ary">View Details</a></p>
					</div>

				</div>
			</div>
		</div>

	</div>
</section>


<section class="ftco-section ftco-category ftco-no-pt fade-in-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6 order-md-last align-items-stretch d-flex">
						<div class="category-wrap-2  img align-self-stretch d-flex"
							style="background-image: url(images/category.jpg);">
							<div class="text text-center">
								<h2>Vegetables</h2>
								<p>Protect the health of every home</p>
								<p><a href="#" class="btn btn-primary">Shop now</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="category-wrap  img mb-4 d-flex align-items-end"
							style="background-image: url(images/category-1.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Fruits</a></h2>
							</div>
						</div>
						<div class="category-wrap  img d-flex align-items-end"
							style="background-image: url(images/category-2.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Vegetables</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="category-wrap  img mb-4 d-flex align-items-end"
					style="background-image: url(images/category-3.jpg);">
					<div class="text px-3 py-1">
						<h2 class="mb-0"><a href="#">Juices</a></h2>
					</div>
				</div>
				<div class="category-wrap  img d-flex align-items-end"
					style="background-image: url(images/category-4.jpg);">
					<div class="text px-3 py-1">
						<h2 class="mb-0"><a href="#">Dried</a></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section fade-in-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center">
				<span class="subheading">Featured Products</span>
				<h2 class="mb-4">Our Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">

			<?php
			$selectOffer = "select * from items where offer =1";
			$res = $connect->query($selectOffer);

			while ($row = $res->fetch_assoc()) {



				?>
				<div class="col-md-6 col-lg-3">
					<div class="product">
						<a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $row['imgPath'] ?>"
								alt="Product Image">

							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="#">
									<?php echo $row['name']; ?>
								</a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span>
											<?php echo $row['price']; ?>
										</span></p>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">



								<!-- For the cart button if there is session add to cart else redirect to login page-->

									<?php if (isset($_SESSION["userID"])) { ?>

										<span><a class="buy-now d-flex justify-content-center align-items-center mx-1"
												href="index.php?itemID=<?php echo $row['id'] ?>"><i
													class="fas fa-shopping-cart"></i></a></span>



									<?php } else { ?>


										<span><a class="buy-now d-flex justify-content-center align-items-center mx-1"
												href="login.php"><i
													class="fas fa-shopping-cart"></i></a></span>

									<?php } ?>




								</div>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>
</section>


<footer class="ftco-footer ftco-section">
	<div class="container">
		<div class="row mb-2">

			<div class="col-md ">
				<div class="ftco-footer-widget mb-4 ">
					<h2 class="ftco-heading-2">GreenZ</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
					<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-facebook"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Menu</h2>
					<ul class="list-unstyled">
						<li><a href="shop.php" class="py-2 ">Shop</a></li>
						<li><a href="about.php" class="py-2 ">About</a></li>
						<li><a href="contact.php" class="py-2 ">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Help</h2>
					<div class="d-flex">
						<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
							<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
							<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
							<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
							<li><a href="#" class="py-2">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Have a Questions?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><i class="fas fa-map-marker-alt"></i><span class="text"> Cairo, Egypt</span></li>
							<li><i class="fas fa-phone"></i><span class="text">01064477689</span>
							</li>
							<li><i class="fas fa-envelope"></i><span class="text">info@GreenZ.com</span></>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>


</body>

</html>