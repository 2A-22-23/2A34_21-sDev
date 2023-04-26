<?php
include "../../Modal/User.php";
include "../../Controller/UserC.php";

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['roleu'])) {
    $User = new User($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['sexe'],$_POST['email'],$_POST['mdp'],$_POST['roleu']);



    // Move the uploaded file to the target directory

        $UserC = new UserC();
        $UserC->ajouteruser($User);
        header('Location: index.php');

        // There was an error uploading the file
        echo "Error uploading file.";
    
} else {
    echo "Verify all fields are filled";

}
?>