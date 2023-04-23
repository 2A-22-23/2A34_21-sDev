<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
            require '../../config.php';
        ?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">   
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Questions</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql = 'SELECT * FROM `questions`';
                        $pdo = config::getConnexion();
                        try{
                            $list = $pdo->prepare($sql);
                            $list->execute();
                            $result = $list->fetchAll();
                            $count=0;
                            if ($result && count($result) > 0) {
                                foreach ($result as $row) {
                                    $count++;
                                }
                            }
                            echo $count;
                        }
                        catch(Exception $e){
                            die('Erreur: '.$e->getMessage());
                        }
                    ?>

                   </h5>
                </div>
            </div>
        </div>
        
    </div>


    <div id="main-content" class="container allContent-section py-4">
        <div class="row">   
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Answers</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql = 'SELECT * FROM `answers`';
                        $pdo = config::getConnexion();
                        try{
                            $list = $pdo->prepare($sql);
                            $list->execute();
                            $result = $list->fetchAll();
                            $count=0;
                            if ($result && count($result) > 0) {
                                foreach ($result as $row) {
                                    $count++;
                                }
                            }
                            echo $count;
                        }
                        catch(Exception $e){
                            die('Erreur: '.$e->getMessage());
                        }
                    ?>
                   </h5>
                </div>
            </div>
        </div>
        
    </div>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>