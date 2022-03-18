<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> 
	
	<!-- Font Awesome Icon Library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>BookHood</title>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark px-1">
      <div class="container-fluid d-flex">
        <a class="navbar-brand" href="<?php echo base_url() ?>/home">BookHood</a>
		
		<div class="nav-item pe-1 ms-auto">
			<button type="button" class="btn btn-outline-light d-block d-md-none"><i class="bi bi-search"></i></button>
		</div>
		<?php if(!session()->get('isLoggedIn')): ?>
			<div class="nav-item pe-1">
				<a href="<?php echo base_url() ?>/login" class="btn btn-outline-secondary d-block d-md-none"><i class="bi bi-box-arrow-in-right"></i></i></a>
			</div>
		<?php else: ?>
			<div class="nav-item pe-1">
				<a href="<?php echo base_url() ?>/profile/<?php echo session()->get('id') ?>" class="btn btn-outline-secondary d-block d-md-none"><i class="bi bi-person-circle"></i></i></a>
			</div>
		<?php endif ?>
		
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		
        <div class="collapse navbar-collapse" id="navbarContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="<?php echo base_url() ?>/home">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="broswe" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Categories
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<ul class="list-group list-group-horizontal"></ul>                            
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Adventure">Adventure</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Crime-Mystery">Crime & Mystery</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Fantasy">Fantasy</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Historical">Historical Fiction</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Horror-Thriller">Horror & Thriller</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Lgbtq">LGBTQ+</a></li>                            
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Romance">Romance</a></li>
						<li><a class="dropdown-item" href="<?php echo base_url() ?>/browse/Sci-fi">Science Fiction</a></li>
					</ul>
				</li> 
				<?php if(!session()->get('isLoggedIn')): ?>
					<li class="nav-item d-none d-lg-flex">
						<a class="nav-link" aria-current="page" href="<?php echo base_url() ?>/login">Login</a>
					</li>
				<?php else: ?>
					<li class="nav-item d-none d-lg-flex">
						<a class="nav-link" aria-current="page" href="<?php echo base_url() ?>/profile/<?php echo session()->get('id') ?>">Profile</a>
					</li>
				<?php endif ?>
			</ul>
			<form class="d-none d-md-flex">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchBox" id="searchBox">				
			</form>
			<div class="container-fluid w-25 me-4 p-0 border border-secondary bg-white" id="searchResults" style="position: absolute; top: 100%; z-index: 100; display: none;right:0;">
			</div>
        </div>
      </div>
    </nav>
	
	<script>
		$(document).ready(function() {
			$("#searchBox").keyup(function () {
				//Clear space
				resultsDiv = document.getElementById('searchResults');
				while (resultsDiv.firstChild) {
					resultsDiv.removeChild(resultsDiv.lastChild);
				}
		
				searchValue = document.getElementById('searchBox').value;
				console.log(searchValue);
				if(searchValue != ""){
					fetch('https://mi-linux.wlv.ac.uk/~1801448/bookhood/public/index.php/ajax/search/' + searchValue)
					.then(response => response.json())
					.then(response => {							
						resultBooks = document.createElement('p');
						resultBooks.setAttribute('class','my-2 px-3 bg-secondary text-white fst-italic');
						resultBooks.innerHTML = "Books";
						resultsDiv.append(resultBooks);
						response['books'].forEach(function(result,index){
							resultLink = document.createElement('a');
							
							title = document.createElement('p');
							title.setAttribute('class','px-3 mb-2');
							title.innerHTML = result.title;
							
							resultsDiv.append(title);
						});	
						
						resultAuthors = document.createElement('p');
						resultAuthors.setAttribute('class','my-2 px-3 bg-secondary text-white fst-italic');
						resultAuthors.innerHTML = "Authors";
						resultsDiv.append(resultAuthors);
						response['authors'].forEach(function(result,index){
							resultLink = document.createElement('a');
							
							title = document.createElement('p');
							title.setAttribute('class','px-3 mb-2');
							title.innerHTML = result.author;
							
							resultsDiv.append(title);
						});
						
						resultPublishers = document.createElement('p');
						resultPublishers.setAttribute('class','my-2 px-3 bg-secondary text-white fst-italic');
						resultPublishers.innerHTML = "Publishers";
						resultsDiv.append(resultPublishers);
						response['publishers'].forEach(function(result,index){
							resultLink = document.createElement('a');
							
							title = document.createElement('p');
							title.setAttribute('class','px-3 mb-2');
							title.innerHTML = result.publisher;
							
							resultsDiv.append(title);
						});
						
						resultsDiv.style.display = "block";
					})
					.catch(err => {
						console.log(err);
					});
				} else {
					resultsDiv.style.display = "none";
				}					
			});
		});
	</script>