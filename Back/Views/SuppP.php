<?PHP
include "../core/ProductC.php";
$ProductC = new ProductC();

if (isset($_POST["id"])){
    $ProductC->deletePoduit($_POST["id"]);
    header('Location: ProduitAFF.php');
}

?>