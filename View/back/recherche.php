<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'utilisateurs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://classless.de/classless.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Recherche d'utilisateurs</h1>
    <br>
    <input type="search" id="recherche">
    <div id="output"></div>

    <script>
        $(document).ready(function(){
            $('#recherche').keyup(function(){
                let input = $(this).val();
                if(input !=''){
                    $.ajax({
                        url:"./search.php",
                        method:"POST",
                        data:{input : input},
                        success:function(data){
                            $("#output").html(data);
                            $("#output").css("display","block");
                        }
                    });
                } else {
                    $("#output").css("display","none");
                }
            });
        });
    </script>
</body>
</html>
