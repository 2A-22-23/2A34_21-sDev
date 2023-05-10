<?php
    require '../../Controller/sponsorC.php';
    $sponsorC = new sponsorC();
    if (isset ($_GET["id"])&&!empty($_GET["id"])){
        $list = $sponsorC->delete_sponsor($_GET["id"]);
        header('location:listSponsor.php');
    }
    else {
        echo "undefined id";
    }
?>