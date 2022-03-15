<div class="container" style="background: #ebebeb;">
	<p class="display-6 pt-3 text-center">Profile</p>
	<hr>
	<div class="d-flex flex-column flex-md-row align-items-center mt-3">
		<img class="rounded-circle p-2 img-fluid" src="books.jpg" width="180px">
		<div class="d-flex flex-grow-1">
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
		</div>

		<div class="d-flex flex-row flex-md-column">
			<button type="button" class="btn btn-outline-secondary m-2" data-bs-toggle="modal" data-bs-target="#profileModal">
				<i class="bi bi-pencil-square"></i> Edit profile</button>
			<a class="btn btn-outline-success m-2" href="<?php echo base_url() ?>/add_book"><i class="bi bi-plus-square"></i> Add book</a>
			<a class="btn btn-outline-danger m-2" href="<?php echo base_url() ?>/logout"><i class="bi bi-box-arrow-right"></i> Disconnect</a>
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
				<a class="dropdown-item">Added to website</a>
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
			<li class="nav-item">
				<a class="nav-link link-dark" aria-current="page" href="#">Added to website</a>
			</li>
		</ul>
	</div>
	

	<div class="row mx-0 mt-2">
		
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3 mx-3">
					<label for="profile" class="form-label">New Profile Picture</label>
					<input type="file" name="profile" class="form-control" accept=".png, .jpg" />
                </div>
				<div class="mb-3 mx-3">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" placeholder="PinkLabrator53">
				</div>
				<div class="mb-3 mx-3">
					<label for="email">Email address</label>
					<input type="email" class="form-control" name="email" placeholder="name@example.com">					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>