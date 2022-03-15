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

    <title>BookHood</title>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-1">
      <div class="container-fluid d-flex">
        <a class="navbar-brand" href="#">BookHood</a>
		
		<div class="nav-item pe-1 ms-auto">
			<button type="button" class="btn btn-outline-light d-block d-lg-none"><i class="bi bi-search"></i></button>
		</div>
		<?php if(!session()->get('isLoggedIn')): ?>
			<div class="nav-item pe-1">
				<a href="<?php echo base_url() ?>/login" class="btn btn-outline-secondary d-block d-lg-none"><i class="bi bi-box-arrow-in-right"></i></i></a>
			</div>
		<?php else: ?>
			<div class="nav-item pe-1">
				<a href="<?php echo base_url() ?>/profile/<?php echo session()->get('id') ?>" class="btn btn-outline-secondary d-block d-lg-none"><i class="bi bi-person-circle"></i></i></a>
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
			<form class="d-none d-lg-flex me-2">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-light" type="submit">Search</button>
			</form>
        </div>
      </div>
    </nav>