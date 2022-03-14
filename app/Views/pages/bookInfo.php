<div class="container" style="background: #ebebeb;">
	<div class="row">
		<div class="col-12 col-md-4 col-lg-3 order-1 order-sm-1">
			<div class="d-flex justify-content-center mt-3">
				<img src="<?=base_url('covers')?>/<?php print_r($cover['file_name'])?>" class="img-fluid" width="220px">
			</div>              
		</div>
		
		<div class="col-12 col-md-8 col-lg-9 order-2 order-sm-2">
			<div class="d-flex flex-row justify-content-between align-items-center">
				<div class="d-flex flex-row align-items-end">
					<p class="mb-0 me-1 fs-1"><?= esc($book['title']) ?></p>
					<p class="mb-1 ms-1 fs-4 fw-light">by <?= esc($book['author']) ?></p>
				</div>

				<button class="btn btn-outline-dark dropdown-toggle" type="button" id="listMenuButton"
					data-bs-toggle="dropdown" aria-expanded="false">Add to List </button>
				<div class="dropdown-menu" aria-labelledby="listMenuButton">
					<a class="dropdown-item active">Want to  Read</a>
					<a class="dropdown-item">Reading</a>
					<a class="dropdown-item">Completed</a>
				</div>
			</div>
			<p>Rating</p>

			<p class="text-uppercase fst-italic">Summary</p>
			<p><?= esc($book['summary']) ?></p>
			
			<hr>
			<p class="mb-1">Publisher: <?= esc($book['publisher']) ?></p>
			<p class="mb-1">Release Date: <?= esc($book['release_date']) ?></p>
			<p class="mb-1">Category: <?= esc($book['category']) ?></p>
		</div>
	</div>
	
	<hr>

	<div class="row">
		<div class="col-12 col-md-8 col-lg-9 order-3 order-sm-3">
			<div class="d-flex flex-row justify-content-between align-items-center">
				<p class="fs-3 fw-light">Reviews</p>
				<button class="btn btn-dark h-75">Add review</button>
			</div>
		</div>
		
		<div class="col-12 col-md-4 col-lg-3 order-4 order-sm-4">
			<div class="card">
				<div class="card-body">
					<p class="fs-5 fw-bold">You might also like</p>

					<div class="row">
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>