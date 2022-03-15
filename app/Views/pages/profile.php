<div class="container" style="background: #ebebeb;">
	<p class="display-6 pt-3 text-center">Profile</p>
	<hr>
	<div class="d-flex flex-column flex-md-row align-items-center mt-3">
		<img class="rounded-circle p-2 img-fluid" src="books.jpg" width="180px">
		<table class="table table-sm mx-3">
			<tbody>
				<tr>
					<th>Username:</th>
					<td><?= esc($username) ?></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><?= esc($email) ?></td>
				</tr>
				<tr>
					<th>Joined:</th>
					<td><?= esc($joined) ?></td>
				</tr>
				<tr>
					<th>Reviews:</th>
					<td>5</td>
				</tr>
			</tbody>
		</table>

		<div class="d-flex flex-row flex-md-column">
			<a class="btn btn-outline-success m-2" href="<?php echo base_url() ?>/add_book">Add book</a>
			<a class="btn btn-outline-danger m-2" href="<?php echo base_url() ?>/logout">Disconnect</a>
		</div>            
	</div>       

	<div class="d-md-none">
		<div class="dropdown text-center my-2">
			<button class="btn btn-outline-dark dropdown-toggle" type="button" id="listMenuButton"
				data-bs-toggle="dropdown" aria-expanded="false">Want to Read</button>
			<div class="dropdown-menu" aria-labelledby="listMenuButton">
				<a class="dropdown-item active">Want to  Read</a>
				<a class="dropdown-item">Reading</a>
				<a class="dropdown-item">Completed</a>
			</div>
		</div>
	</div>
	<div class="d-none d-md-inline">
		<ul class="nav nav-tabs mx-5 mt-4">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="#">Want to Read</a>
			</li>
			<li class="nav-item">
				<a class="nav-link link-dark" aria-current="page" href="#">Reading</a>
			</li>
			<li class="nav-item">
				<a class="nav-link link-dark" aria-current="page" href="#">Completed</a>
			</li>
		</ul>
	</div>
	

	<div class="row mx-0 mt-2">
		
	</div>
</div>