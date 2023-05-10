<?php
    require '../../Controller/eventC.php';
    $eventC = new eventC();
    $list = $eventC->listevent();
    //var_dump($list);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="list.css" >
</head>
<body>
<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Youth Space</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="http://localhost/crud/View/createEvent.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">ADD EVENT</span>
				</a>
			</li>
			<li>
				
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			
    <?php
        echo "<table>";
        echo "<tr> <th>ID event</th> <th>Nom</th> <th>Date debut</th> <th>Date fin</th> <th>Prix</th> <th>Description</th><th>Id organisateur</th> <th>Image</th>  <th>Delete</th> <th>Update</th> </tr>";
        foreach ($list as $row){
            echo "<tr> <td>".$row['id_event']."</td> <td>".$row['nom']."</td> <td>".$row['date_debut']."</td> <td>".$row ['date_fin']."</td> <td>".$row ['prix']."</td>  <td>".$row ['description']."</td> <td>".$row ['id_organ']."</td>  <td><img src='img/".$row['image']."' height='100' alt='".$row['image']."'></td> <td> <a href='deleteEvent.php?id=".$row['id_event']."'>Delete</a> </td> <td> <a href='update.php?id=".$row['id_event']."'>Update</a> </td> </tr>";
        }
        echo "</table>";
    ?>
     <a href="createEvent.php">Create</a>
    	<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
   
</body>
</html>
