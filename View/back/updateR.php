<?php
include "../../Model/Role.php";
include "../../Controller/RoleC.php";

if (isset($_POST['roles'])) {
    $Role = new Role($_POST['roles']);

  
      
        $Role1C = new RoleC();
        $result=    $Role1C->modifierrole($Role,$_POST['id']);
      
      
    

    header('Location: listerole.php');

} else {
    echo "Verify all fields are filled";
//     var_dump($_POST);
// var_dump($_FILES);
}
?>