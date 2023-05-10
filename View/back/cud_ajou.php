<?php
include "../../Model/Role.php";
include "../../Controller/RoleC.php";

if ( isset($_POST['roles'])) {
    $Role = new Role($_POST['roles']);



    // Move the uploaded file to the target directory

        $RoleC = new RoleC();
        $RoleC->ajouterrole($Role);
        header('Location: listerole.php');

        // There was an error uploading the file
        echo "Error uploading file.";
    
} else {
    echo "Verify all fields are filled";

}
?>