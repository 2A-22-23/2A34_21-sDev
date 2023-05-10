<?php

    require_once     '../../Controller/clubC.php';
    require_once '../../Model/club.php' ;
    $clubC = new clubC();
    

    if (isset($_POST['idclub'] ) && isset($_POST['titre']  )&& isset($_POST['type']  )&& isset($_POST['fondateur']  )&& isset($_POST['date']  )) 
    {
        echo $_POST['idclub'] ;
            $club = new club($_POST['idclub'] , $_POST['titre'] , $_POST['type'], $_POST['fondateur'], $_POST['date']);
            $clubC->modifierclub($club);
            header('Location:afficherclubadmin.php');
    }else
    {
        $a = $clubC->getclubbyID($_GET['id']) ;
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="create.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
</head>
<?php
            include "./adminHeader.php";
            include "./sidebar.php";
            ?>
        <h2>Clubs</h2>
        

      
    
        <form action="" method="POST">
            <table class="table">
                <tr>
                    <td>
                        <label for="idclub">idclub:</label>
                    </td>
                    <td>
                        <input type="number" name="idclub" id="idclub" maxlength="20" value="<?php echo $a['idclub'];?>"  readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">titre:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['titre'];?>" name="titre" id="titre" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="type">type:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['type'];?>" name="type" id="type" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fondateur">fondateur:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['fondateur'];?>" name="fondateur" id="fondateur" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:</label>
                    </td>
                    <td>
                        <input type="date" value="<?php echo $a['date'];?>" name="date" id="date" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Modifier">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </table>
        </form>
    

        </div>
                                
                                <!-- END WHITE BACKGROUND-->
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="BackOffice/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
<!-- end document-->