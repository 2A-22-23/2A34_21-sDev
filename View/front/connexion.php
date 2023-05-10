<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
    
<body>
<?php include 'header.php'; ?>
	<main id="main">

		<!-- ======= Breadcrumbs ======= -->
		<div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
		<div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

			<h2>Authentification</h2>
			<ol>
			<li><a href="index2.php">Home</a></li>
			<li>Authentification</li>
			</ol>

		</div>
		</div><!-- End Breadcrumbs -->

		<!-- ======= About Section ======= -->
		<section id="about" class="about">
		<div class="container" data-aos="fade-up">

			<div class="row position-relative">

			</div>
		</section>
		<!-- End About Section -->


	</main><!-- End #main -->


	<form method="POST" action="authentification.php">
		<label for="email">Adresse e-mail :</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="mdp">Mot de passe :</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Se connecter">
	</form>
	<link rel="stylesheet" href="styleForm.css">
	<div>
	<a href="mot_de_passe_oublie.php">Mot de passe oublié ?</a>
</div>
<footer id="footer" class="footer">

<div class="footer-content position-relative">
  <div class="container">
	<div class="row">

	  <div class="col-lg-4 col-md-6">
		<div class="footer-info">
		  <h3>YOUTH SPACE</h3>
		  <p>
			A108 Adam Street <br>
			NY 535022, USA<br><br>
			<strong>Phone:</strong> +1 5589 55488 55<br>
			<strong>Email:</strong> info@example.com<br>
		  </p>
		  <div class="social-links d-flex mt-3">
			<a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
			<a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
			<a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
			<a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
		  </div>
		</div>
	  </div><!-- End footer info column-->

	  <div class="col-lg-2 col-md-3 footer-links">
		<h4>Useful Links</h4>
		<ul>
		  <li><a href="#">Home</a></li>
		  <li><a href="#">About us</a></li>
		  <li><a href="#">Services</a></li>
		  <li><a href="#">Terms of service</a></li>
		  <li><a href="#">Privacy policy</a></li>
		</ul>
	  </div><!-- End footer links column-->

	  <div class="col-lg-2 col-md-3 footer-links">
		<h4>Our Services</h4>
		<ul>
		  <li><a href="#">Web Design</a></li>
		  <li><a href="#">Web Development</a></li>
		  <li><a href="#">Product Management</a></li>
		  <li><a href="#">Marketing</a></li>
		  <li><a href="#">Graphic Design</a></li>
		</ul>
	  </div><!-- End footer links column-->

	  <div class="col-lg-2 col-md-3 footer-links">
		<h4>Hic solutasetp</h4>
		<ul>
		  <li><a href="#">Molestiae accusamus iure</a></li>
		  <li><a href="#">Excepturi dignissimos</a></li>
		  <li><a href="#">Suscipit distinctio</a></li>
		  <li><a href="#">Dilecta</a></li>
		  <li><a href="#">Sit quas consectetur</a></li>
		</ul>
	  </div><!-- End footer links column-->

	  <div class="col-lg-2 col-md-3 footer-links">
		<h4>Nobis illum</h4>
		<ul>
		  <li><a href="#">Ipsam</a></li>
		  <li><a href="#">Laudantium dolorum</a></li>
		  <li><a href="#">Dinera</a></li>
		  <li><a href="#">Trodelas</a></li>
		  <li><a href="#">Flexo</a></li>
		</ul>
	  </div><!-- End footer links column-->

	</div>
  </div>
</div>

<div class="footer-legal text-center position-relative">
  <div class="container">
	<div class="copyright">
	  &copy; Copyright <strong><span>YOUTH SPACE</span></strong>. All Rights Reserved
	</div>
	<div class="credits">
	  <!-- All the links in the footer should remain intact. -->
	  <!-- You can delete the links only if you purchased the pro version. -->
	  <!-- Licensing information: https://bootstrapmade.com/license/ -->
	  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
	  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
	</div>
  </div>
</div>

</footer>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>