<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Page 2</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Page-2.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.8.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "front",
		"logo": "images/default-logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 2">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="fr"><header class="u-clearfix u-header u-header" id="sec-5a0b"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">

  <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>n</th>
                <th>chaine</th>
                <th>categorie</th>
                <th>langue </th>
                <th>manager</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
require_once('Model.php');
$model = new Model();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['cat']; ?></td>
                <td><?php echo $row['langue']; ?></td>
                <td><?php echo $row['manager']; ?></td>
                <td>
                <form method="post" action="delete.php">

                <td>
    <a href="delete.php?j2=<?php echo $row['nom']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
    <a href="edit.php?id=<?php echo $row['nom']; ?>"   onclick="return confirm('Are you sure you want to modify this record?')"class="badge badge-danger">edit</a>
</td>
                  </form>
                  
                 
                </td>
              </tr>

              <?php
                }
              }else{
                echo "no data";
            }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</body></html>