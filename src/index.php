<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width", initial-scale="1", shrink-to-fit="no">

    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<!-- Custom CSS -->
		<link rel ="stylesheet" type = "text/css" href = "css/index_style.css"> 

		<title>Movies</title>
		
	</head>

	<?php include_once("connection.php") ?>

	<body>
		<main>
			<div class="container-fluid">
				<div class="row" style="padding-bottom: 5px">
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top w-100 py-4">
						<a class="navbar-brand" href="#"><h1>Movies</h1></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>

						</button>

						<div class="collapse navbar-collapse " id="navbars">
							<ul class="navbar-nav mr-auto">
							</ul>
							<form class="form-inline my-2 my-lg-0" name="searchbar" method="get">
								<label class="text-white px-2" for="Order">Sort by:</label>
								<select class="form-control mr-sm-2" name="Order">
									<option value="Default">Default</option>
									<option value="Alphabetical">Alphabetical</option>
									<option value="ReleaseYr">Year of release</option>
									<option value="Controversy">Controversy</option>
									<option value="Popularity">Popularity</option>
								</select>
								<select class="form-control mr-sm-2" name="AsDs">
									<option value="Ascend">Ascending</option>
									<option value="Desscend">Descending</option>
								</select>
								<label class="text-white px-2" for="Searchby">Search by:</label>
								<select class="form-control mr-sm-2" name="Searchby">
									<option value="Name">Name</option>
									<option value="Genre">Genre</option>
									<option value="Tag">Tag</option>
								</select>
								<input class="form-control mr-sm-2" type="text" name="q" placeholder="Enter Keyword..." />
								<button class="btn btn-secondary btn-outline-light" type="submit">Submit</button>
							</form>	
						</div>
					</nav>
				</div>
					
			</div>
			<?php include_once("movielist.php") ?>
			
		</main>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
	<!-- REFERENCE FOR BOOTSTRAP CODE  -->
	<!-- https://getbootstrap.com/docs/4.0/components/-->
<html>