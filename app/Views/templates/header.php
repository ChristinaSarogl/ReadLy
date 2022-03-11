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

    <title>ReadLy</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-1">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ReadLy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo base_url() ?>/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo base_url() ?>/profile">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="broswe" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Browse
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <ul class="list-group list-group-horizontal"></ul>                            
                    <li><a class="dropdown-item" href="#">Adventure</a></li>
                    <li><a class="dropdown-item" href="#">Crime & Mystery</a></li>
                    <li><a class="dropdown-item" href="#">Fantasy</a></li>
                    <li><a class="dropdown-item" href="#">Historical Fiction</a></li>
                    <li><a class="dropdown-item" href="#">Horror</a></li>
                    <li><a class="dropdown-item" href="#">Humour</a></li>
                    <li><a class="dropdown-item" href="#">LGBTQ+</a></li>                            
                    <li><a class="dropdown-item" href="#">Romance</a></li>
                    <li><a class="dropdown-item" href="#">Science Fiction</a></li>
                    <li><a class="dropdown-item" href="#">Thriller</a></li>
                    <li><a class="dropdown-item" href="#">Yound Adults</a></li>
                </ul>
            </li>                  
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
          <a class="nav-link text-white" href="<?php echo base_url() ?>/login">Login</a>
        </div>
      </div>
    </nav>