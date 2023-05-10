<?PHP

require_once(__DIR__ . '/../../Controller/proC.php'); 
$ProductC = new ProductC();

if (isset($_POST["id"])){
    $ProductC->deleteProduit($_POST["id"]);
    header('Location: Produit.php');
}

?>