
<?php

session_start (); 
if (!isset($_SESSION['tokene']) || $_SESSION['tokene'] !== $_GET['tokene']) {
  header('Location: ../Front/connexion.php');
    exit();
}
?>
          <?php
                        
                        require_once(__DIR__ . '/../../Controller/proC.php'); 
                        $ProductC=new ProductC();
                        $listepro=$ProductC-> Afficherproducts();
                        $listemovieQuery = $ProductC->Afficherpaniers(); 
                        
                        
                        // the PDOStatement object returned by the function
                        $listemovie = $listemovieQuery->fetchAll(PDO::FETCH_ASSOC); // fetch the results and store them in an array
                        
                        $total = 0;
                        $numItems = count($listemovie);
                    
                        ?>
<?php
    require '../../Controller/eventC.php';
    require '../../Controller/questionC.php';
    $eventC = new eventC();
    $list = $eventC->listevent();
    //var_dump($list);
   
    $questionC = new questionC();
    $liste = $questionC->listQuestions();
?> 


<?php
  require '../../Controller/clubC.php';
  require '../../Controller/salleC.php';
  $clubC = new clubC();
  $club = $clubC->trierClubParNom();
?>
  <script>
function addToCart(productId) {
    // Send AJAX request to add product to cart
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add-to-cart.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Product added to cart successfully!");
        }
    };
    xhr.send("product_id=" + productId);
}
</script>
<style>
.rating-widget {
  font-size: 24px;
  
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
}

.rating-widget .star {
  cursor: pointer;
  color: #ccc;
  
}

.rating-widget .star:hover,
.rating-widget .star:hover ~ .star {
  color: #ffcc00;
}


</style>


<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
  
  <?php include 'header.php'; ?>
  <!-- ======= Header ======= -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Welcome to <span> <br> YOUTH SPACE</span></h2>
            <p data-aos="fade-up">A place for growth and connection.</p>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/1.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/5.jpg)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

        <!-- ======= Clubs Section ======= -->
    <section id="features" class="features section-bg">
      <div class="container" data-aos="fade-up">

      <h1 class="our_text">Nos Evenement</h1>
         <p class="ipsum_text" hidden>There are many variations of passages of Lorem Ipsum </p>
         <div class="furnitures_section2 layout_padding">

            <div class="row">
               <?php foreach ($list as $row) { ?>
                  <p hidden><?php echo $row['id']; ?></p>
                
                  <div class="col-md-6">
                     <div class="card text-center" style="width: auto;">
                        <div class="container_main">
                           <img src="../back/img/<?php echo $row['image']; ?>" class="width: 100px; height: 200px;">
                           <div class="overlay">
                              
                              
                              </a>
                           </div>
                        </div>
                        <div class="card-body">
                        <div class="card-header text-danger text-capitalize text-left" style="font-size: 32px;"><?php echo $row["nom"]; ?></div>
                        <ul class="list-group list-group-flush">
                        <div class="card-header text-primary text-capitalize" style="font-size: 28px;"><?php echo $row['description']; ?></div>
                        <li class="list-group-item text-warning " style="font-size: 20px;">Prix : <?php echo $row['prix']; ?> Dt   </li>
                        <a href="send.php?id= <?= $row['id_event'] ?> ">participer</a>
                        
   
                     </ul>
                        </div>
                     </div>
               </div>
                  <?php } ?>
                  </div>

            </div>
    </section><!-- End Constructions Section -->

            <!-- ======= Clubs Section ======= -->
    <section id="features" class="features section-bg">
      <div class="container" data-aos="fade-up">

      <h1 class="our_text">Nos Clubs</h1>
         <p class="ipsum_text" hidden>There are many variations of passages of Lorem Ipsum </p>
         <div class="furnitures_section2 layout_padding">
         <?php 
            foreach ($club as $club) {
          ?>
        <div class="card-container">
          <div class="card">
            <h2><?php echo $club['titre'] ; ?></h2>
            <p><?php echo $club['fondateur'] ; ?></p>
            <p><strong>typessssss:</strong> <?php echo $club['type'] ; ?></p>
            <p><strong>date:</strong> <?php echo $club['date'] ; ?> </p>
          </div>
          <style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }


    .card {
        background-color: #39A78E;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        margin: 10px;
        padding: 10px;
        width: 300px;
    }

    .card h2 {
        font-size: 20px;
        margin: 0;
        color: white;
    }

    .card p {
        font-size: 16px;
        margin: 10px 0;
        color: white;
    }

    .card a {
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        display: inline-block;
        font-size: 16px;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .card a:hover {
        background-color: #0056b3;
    }
</style>
      <?php
        }
      ?>
          </div>

        </div>
    </section><!-- End Constructions Section -->

    <section id="constructions" class="constructions">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Produit</h2>
          <p>Explore and discover our plans and Product coming</p>
        </div>

    



        <section class="section-products">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-8 col-lg-6">
				<div class="header">
				
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($listepro as $row) { ?>
			<!-- Single Product -->
			<div class="col-md-6 col-lg-4 col-xl-3">
      <div id="product-<?php echo $row['id']; ?>" class="single-product">

       
					<div class="part-1">
             <div class="card-bg"> <img src="../Back/maryem/images/<?php echo $row['img'];?>" alt="streamlab-image" style="width: 400px; padding: 0px ; height:300px "></div>
						<ul>
							<li><a href="addtocart.php?id=<?PHP echo $row['id']; ?>"><i class="fas fa-shopping-cart"></i></a></li>
				
						</ul>
					</div>


          <div class="rating-widget" data-product="<?php echo $row['id']; ?>">
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 5)" data-value="5" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 4)" data-value="4" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 3)" data-value="3" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 2)" data-value="2" class="star">&#9733;</a>
  <a href="#" onclick="submitRating(<?php echo $row['id']; ?>, 1)" data-value="1" class="star">&#9733;</a>
</div>

<script>
  // Function to set the selected stars for a product based on its saved rating
// Function to set the selected stars for a product based on its saved rating
function setSelectedStars(productId, savedRating) {
  var stars = document.querySelectorAll('.rating-widget[data-product="' + productId + '"] a.star');
  stars.forEach(function(star) {
    var value = star.getAttribute('data-value');
    star.classList.remove('selected');
    star.classList.remove('disabled');
    star.setAttribute('href', '#');
    star.setAttribute('onclick', 'submitRating(' + productId + ', ' + value + ')');
    if (savedRating && value <= savedRating) {
      star.classList.add('selected');
      star.removeAttribute('href');
      star.removeAttribute('onclick');
    } else if (savedRating && value > savedRating) {
      star.classList.add('disabled');
      star.removeAttribute('href');
      star.removeAttribute('onclick');
    }
  });
}





  // Loop through all the rating widgets and set the selected stars for each product
  var ratingWidgets = document.querySelectorAll('.rating-widget');
  ratingWidgets.forEach(function(widget) {
    var productId = widget.getAttribute('data-product');
    var savedRating = localStorage.getItem("rating_" + productId);
    if (savedRating) {
      setSelectedStars(productId, savedRating);
    }
  });

  // Function to submit the rating for a product
  function submitRating(productId, rating) {
    var url = "submit.php?id=" + productId + "&rating=" + rating;
    var stars = document.querySelectorAll('.rating-widget[data-product="' + productId + '"] a.star');
    stars.forEach(function(star) {
      if (star.getAttribute('data-value') <= rating) {
        star.classList.add('selected');
      }
      if (star.getAttribute('data-value') < rating) {
        star.classList.add('disabled');
        star.removeAttribute('href');
      }
    });
    localStorage.setItem("rating_" + productId, rating);
    stars.forEach(function(star) {
      star.removeAttribute('onclick');
    });
    window.location.href = url; // redirect to the URL
  }

  // Call the setSelectedStars function again after the page has finished loading
  window.onload = function() {
    var ratingWidgets = document.querySelectorAll('.rating-widget');
    ratingWidgets.forEach(function(widget) {
      var productId = widget.getAttribute('data-product');
      var savedRating = localStorage.getItem("rating_" + productId);
      if (savedRating) {
        setSelectedStars(productId, savedRating);
      }
    });
  };
</script>

<style>
.rating-widget a.star.selected {
  color: orange;
}
</style>





					<div class="part-2">
						<h3 class="product-title"><?php echo $row['nom'];?></h3>
            <h4 class="product-old-price"><?php echo $row['genre'];?></h4>
						<h4 class="product-price"><?php echo $row['prix'];?> DT</h4>
					</div>
				</div>
			</div>
			<!-- Single Product -->
			<?php } ?>
		</div>
	</div>
</section>




      </div>
    </section><!-- End Constructions Section -->

  <!-- ======= Forum Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Forum</h2>
        <p>Your are free to express your feelings and your thoughs respectfully</p>
      </div>
      
      <div class="slides-2 swiper">
        <div class="swiper-wrapper">
    <?php foreach ($liste as $row){ ?>
    <?php 
          require 'likesCount.php';
          require 'dislikesCount.php';
          $titre = $questionC->censorBadWords($row['titre']);
          $contenue = $questionC->censorBadWords($row['contenu']); 
    ?>
      <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
              <h2><?= $row['id_auteur'] ?></h2>
              <a href="showOnce.php?idQuestion=<?= $row['idQuestion'] ?>"> <h5 class="card-title"> <?= $titre ?> </h5> </a>
              <p class="card-text"> <?= $contenue ?> </p>
              <p><?= $row['date_publication'] ?></p>
              </div>
            </div>
          </div><!-- End testimonial item -->
    <?php
        }
    ?>
        </div>
        <div style="text-align: center;">
                    <a href="createQuestion.php" style="background-color: #fcc903;" class="btn btn-primary" > Add Question </a>
        </div>

    </div>
  </section><!-- End forum Section -->
  
    <!-- ======= Media Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Media</h2>
          <p>To know more conserning our mediatic team and actions</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-remodeling">Remodeling</li>
            <li data-filter=".filter-construction">Construction</li>
            <li data-filter=".filter-repairs">Repairs</li>
            <li data-filter=".filter-design">Design</li>
          </ul><!-- End Projects Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/remodeling-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/remodeling-1.jpg" title="Remodeling 1" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/construction-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/construction-1.jpg" title="Construction 1" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/repairs-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/repairs-1.jpg" title="Repairs 1" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/design-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/design-1.jpg" title="Repairs 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/remodeling-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/remodeling-2.jpg" title="Remodeling 2" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/construction-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/construction-2.jpg" title="Construction 2" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/repairs-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/repairs-2.jpg" title="Repairs 2" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/design-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/design-2.jpg" title="Repairs 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/remodeling-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Remodeling 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/remodeling-3.jpg" title="Remodeling 3" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/construction-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Construction 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/construction-3.jpg" title="Construction 3" data-gallery="portfolio-gallery-construction" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/repairs-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Repairs 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/repairs-3.jpg" title="Repairs 2" data-gallery="portfolio-gallery-repairs" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

            <div class="col-lg-4 col-md-6 portfolio-item filter-design">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/design-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Design 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/projects/design-3.jpg" title="Repairs 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->

          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/YOUTH SPACE-bootstrap-construction-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

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