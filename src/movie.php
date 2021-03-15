<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width", initial-scale="1", shrink-to-fit="no">

    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Custom CSS -->
		<link rel ="stylesheet" type = "text/css" href = "css/movie_style.css"> 
	
		<title>Movies</title>
	</head>
	<?php include_once("connection.php") ?>
	<body>
		<main>
			<div class = "container-fluid">
				<div class ="row">
					<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top w-100 py-4">
						<a class="navbar-brand" href="#"><h1>
							<?php 
							$id = $_REQUEST['id'];
							$res = $conn -> query("SELECT * FROM movies WHERE movieId = $id");
							if ($res->num_rows == 0) {
								echo "This movie does not exist";
							} else {
								$movie_row = $res->fetch_assoc();
								echo "{$movie_row['title']}";
							}
							?>
						</h1></a>
						<ul class="navbar-nav mr-auto">
						</ul>
								
						<button type="button" class="btn btn-outline-light pull-right" onclick="location.href='index.php'">Back</button>
					</nav>
				</div>
				<div class="row" style="margin-top: 120px">
					<div class="col-2 ">
						<div class="nav flex-column nav-pills position-fixed" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-info-tab" data-toggle="pill" href="#v-pills-info" role="tab" aria-controls="v-pills-info" aria-selected="true">Info</a>
							<a class="nav-link" id="v-pills-suggest-tab" data-toggle="pill" href="#v-pills-suggest" role="tab" aria-controls="v-pills-suggest" aria-selected="false">Suggestions</a>
							<a class="nav-link" id="v-pills-predict-tab" data-toggle="pill" href="#v-pills-predict" role="tab" aria-controls="v-pills-predict" aria-selected="false">Predictions</a>
						</div>
					</div>
					<div class="col-10">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">							
								<?php
									include_once('year.php');
									include_once('genres.php');
									include_once('ratings.php');
									include_once('links.php');
								?>	
							</div>
							<div class="tab-pane fade" id="v-pills-suggest" role="tabpanel" aria-labelledby="v-pills-suggest-tab">
								<?php include_once('suggestions.php'); ?>
							</div>
							<div class="tab-pane fade" id="v-pills-predict" role="tabpanel" aria-labelledby="v-pills-predict-tab">
								<?php include_once('predictions.php'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
<html>