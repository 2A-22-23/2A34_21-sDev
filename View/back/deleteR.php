<?PHP
include "../../Controller/RoleC.php";
$RoleC = new RoleC();

if (isset($_POST["id"])){
    $RoleC->deleteRole($_POST["id"]);
    header('Location: listerole.php');
}

?>