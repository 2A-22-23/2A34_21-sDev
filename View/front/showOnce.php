<?php
    require_once 'showQuestion.php';
    require_once '../../Controller/answerC.php';
    require_once '../../Model/answer.php';
    $idOfTheQuestion = $_GET['idQuestion'];
    if (isset ($_POST ["validate"]) AND isset($_GET['idQuestion'])){
        if (!empty ($_POST ["answer"]) && !empty($_GET['idQuestion']) && !empty($_POST ["id_auteur"])){
          $answer1 = new answer(NULL, $_POST ["answer"], $_POST ["id_auteur"], date('Y-m-d H:i:s'), $idOfTheQuestion);
          $answerC = new answerC();
          $answerC->createAnswer($answer1);
        }
    }
    $answerC = new answerC();
    $list = $answerC->listAnswers($idOfTheQuestion);
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
    
<body>

<?php include 'header.php'; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Question</h2>
        <ol>
          <li><a href="index2.php">Home</a></li>
          <li><a href="listQuestions.php">Forum</a></li>
          <li>Replies</li>
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
    
  <?php 
    require 'likesCount.php';
    require 'dislikesCount.php';
  ?>
    <div class="card text-center">
        <div class="card-header">
        <h2><?= $id_auteur ?></h2>
    </div>

    <div class="card-body">
        <h5 class="card-title"> <?= $titre ?> </h5>
        <p class="card-text"> <?= $contenu ?> </p>
        <a href="deleteQuestion.php?idQuestion=<?= $idOfTheQuestion ?>" style="background-color: #ff0000;" class="btn btn-primary">
        <i class="fa fa-trash" aria-hidden="true"></i></a>
        <a href="updateQuestion.php?idQuestion=<?= $idOfTheQuestion ?>" style="background-color: #fcc903;" class="btn btn-primary">
        <i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#" style="background-color: #ff0000;" class="btn btn-primary">
        <i class="fa fa-flag" aria-hidden="true"></i></a>
        <br><br>
        <button class="btn-like" style="background-color: #22ff00;" data-question-id="<?= $row['idQuestion'] ?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
        <span class="likes-count"><?=$likesCount1?></span>

        <button class="btn-dislike" style="background-color: #bcbcbc;" data-question-id="<?= $row['idQuestion'] ?>"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
        <span class="dislikes-count"><?=$dislikesCount1?></span>
    </div>

    <div class="card-footer text-muted">
        <p><?= $date_publication ?></p>
    </div>

    <br>
    <hr style="border: 5px solid black;">
    <br>

    <script>
      $(document).ready(function() {
        $('.btn-like').click(function(e) {
          e.preventDefault();
          var questionId = $(this).data('question-id');
          $.ajax({
            type: 'GET',
            url: 'like.php',
            data: {idQuestion: questionId},
            success: function(data) {
              var likesCount = parseInt($('.likes-count[data-question-id='+questionId+']').text()) + 1;
              $('.likes-count[data-question-id='+questionId+']').text(likesCount);
            }
          });
        });

        $('.btn-dislike').click(function(e) {
          e.preventDefault();
          var questionId = $(this).data('question-id');
          $.ajax({
            type: 'GET',
            url: 'dislike.php',
            data: {idQuestion: questionId},
            success: function(data) {
              var dislikesCount = parseInt($('.dislikes-count[data-question-id='+questionId+']').text()) + 1;
              $('.dislikes-count[data-question-id='+questionId+']').text(dislikesCount);
            }
          });
        });
      });

    </script>

    <form action="" method="POST">
        <label for="contenu"> Reply </label>
        <textarea name="answer" id="answer"></textarea>
        <br>
        <label for="id_auteur"> Id auteur </label>
        <input type="number" name="id_auteur" id="id_auteur" oninput="validateInput('id_auteur', /^\d+$/)">
        <span id="id_auteur_span"></span>
        <br>
        <br>
        <input type="submit" value="Reply" name= "validate">
        <br>
        <br>
    </form>
    <div id="alerte"> </div>
    <script>
    function validateInput(inputId, regex) {
        const input = document.getElementById(inputId);
        const span = document.getElementById(`${inputId}_span`);

        if (regex.test(input.value)) {
        span.innerText = 'Correct';
        span.style.color = 'green';
        } else {
        span.innerText = 'Incorrect';
        span.style.color = 'red';
        }
    }
  </script>
<style>
    form {
        margin: 0 auto;
        width: 50%;
        text-align: center; /* Ajout d'un alignement centré pour les boutons */
    }
    label {
        display: inline-block;
        width: 20%;
        margin-bottom: 5px;
        text-align: right; /* Ajout d'un alignement à droite pour les labels */
    }
    input[type="text"], textarea, input[type="number"] {
        display: inline-block;
        width: 75%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    #alerte {
        display: inline-block;
        color: red;
        margin-bottom: 10px;
        text-align: center;
    }
    .btn-container {
        margin-top: 10px; /* Ajout d'une marge supérieure pour le conteneur */
        text-align: center; /* Ajout d'un alignement centré pour le conteneur */
    }
    input[type="submit"], input[type="reset"] {
        background-color: #fcc903;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }
    label[for="contenu"], #contenu {
        display: inline-block;
        vertical-align: top;
    }
</style>
<br><br>
<div class="card-header">
                    <h2> Replies </h2>
</div>
<br><br>

<?php foreach ($list as $row){ ?>
  <?php
    $contenu = $questionC->censorBadWords($row['contenu']); 
  ?>
                
                <div class="card text-center">
                    <div class="card-header">
                    <h2><?= $row['id_auteur'] ?></h2>
                    </div>
                    <div class="card-body"> 
                        <p class="card-text"> <?= $contenu ?> </p>
                        <a href="deleteAnswer.php?idAnswer=<?= $row['idAnswer'] ?>" style="background-color: #fcc903;" class="btn btn-primary">
                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="updateAnswer.php?idAnswer=<?= $row['idAnswer'] ?>" style="background-color: #fcc903;" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </div>
                    <div class="card-footer text-muted">
                        <p><?= $row['date_publication'] ?></p>
                    </div>
                </div>
                <br>
                <hr style="border: 5px solid black;">
                <br>
                <?php
                }
                ?>



        
<br>
<br>
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
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
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