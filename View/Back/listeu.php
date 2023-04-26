<?php
require_once "../../Controller/UserC.php";
require_once "../../Modal/User.php";
require_once "../../Controller/RoleC.php";
require_once "../../Modal/Role.php";
require_once "../../Config.php";

if (isset($_GET['id'])) {
    $roleu = $_GET['id'];
    // $Role3C = new RoleC();
    // $roleu = $Role3C->recupereroleu($idu);
   
        $UserC2 = new UserC();
        $listeuser = $UserC2->afficheu($roleu);
    
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Affichage utilisateur</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <?php if(isset($listeuser)): ?>
        <table >
            <thead>
                <tr>
                    <th>IdUser</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Age</th>
                    <th>Sexe</th>
                    <th>Email</th>
                    <!-- <th>Rôle</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeuser as $user) : ?>
                    <tr>
                        <td><?php echo $user['idu']; ?></td>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?php echo $user['prenom']; ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td><?php echo $user['sexe']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <!-- <td><?php echo $user['roleu']; ?></td> -->
                        <td>
                            <form method="POST" action="deleteu.php" class="delete-form">
                                <input type="hidden" value="<?php echo $user['idu']; ?>" name="idu">
                                <button type="submit" name="supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" class="delete-btn">
                                    <img src="./assets/img/trash.png" alt="Supprimer" title="Supprimer">
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
                   
            </tbody>
        </table>
   
</form>
    <?php else: ?>
        <p>Aucun utilisateur à afficher pour ce rôle.</p>
    <?php endif; ?>
</body>
</html>
