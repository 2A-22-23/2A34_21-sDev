<?PHP
include_once "../../Controller/RoleC.php";
$Role2C=new RoleC();
$listeRole2=$Role2C->AfficherRoless() ;

?>
<!DOCTYPE html>
<html lang="en">


<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="viewForum.php" ><i class="fa fa-th-list"></i> Forum</a>
    <a href="./maryem/ProduitAFF.php"><i class="fa fa-th-large"></i> Produit </a>
    <a href="listEvent.php"><i class="fa fa-users"></i> show event</a>
    <a href="listSponsor.php"><i class="fa fa-th-large"></i> show sponsor</a>
    <a href="afficherclubadmin.php"><i class="fa fa-th-large"></i> club </a>
    <a href="affichersalleadmin.php"><i class="fa fa-th-large"></i> salle </a>
    <a href=""><i class="fa fa-th-large"></i> user </a>
 <ul>
 
<?php foreach ($listeRole2 as $row) {
    if ($row['roles'] !== 'admin') {
        ?>
        <li><a href="listeu.php?id=<?php echo $row['id']; ?>"><?php echo $row['roles']; ?></a></li>
        
    <?php
    }
} ?>
<li> <a href="recherche.php"> Recherche </a></li>
</ul>
    <a href="listerole.php"> <i class="fa fa-th-large"></i> role</a>
    <a href="defid.php"><i class="fa fa-th-large"></i> Défi </a>
    <a href="../front/logout.php"><i class="fa fa-th-large"></i> Se Déconnecter</a>
    <div class="social-links d-flex mt-3">
                <a href="https://twitter.com/intent/tweet?text=Awesome%20Blog!&url=https://49ec-197-238-170-100.ngrok-free.app/crud/View/Front/formu.php" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://49ec-197-238-170-100.ngrok-free.app/crud/View/Front/formu.php&quote=Awesome%20Blog!" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="https://wa.me/?text=Awesome%20Blog!%5Cn%20https://49ec-197-238-170-100.ngrok-free.app/crud/View/Front/formu.php" class="d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://49ec-197-238-170-100.ngrok-free.app/crud/View/Front/formu.php" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
                <a href="https://t.me/share/url?url=https://49ec-197-238-170-100.ngrok-free.app/crud/View/Front/formu.php&text=Awesome%20blog!" class="d-flex align-items-center justify-content-center"><i class="bi bi-telegram"></i></a>
              </div>

   
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


</html>