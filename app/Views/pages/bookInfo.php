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

				<?php if(session()->get('isLoggedIn')): ?>
					<button class="btn btn-outline-dark dropdown-toggle" type="button" id="listMenuButton"
						data-bs-toggle="dropdown" aria-expanded="false">Add to List </button>
					<div class="dropdown-menu" aria-labelledby="listMenuButton">
						<form class="mx-2 mt-1">
							<?= csrf_field() ?>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="to-read" value="1">
								<label class="form-check-label">Want to Read</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="reading" value="2">
								<label class="form-check-label">Reading</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="complete" value="3">
								<label class="form-check-label">Completed</label>
							</div>
						</form>
						<hr class="dropdown-divider">
						<a class="dropdown-item"
							href="<?php echo base_url() ?>/profile/<?= esc(session()->get('id')) ?>"><i class="bi bi-eye me-1"></i>View lists</a>
					</div>					
				<?php endif ?>
				
			</div>
			<p>Rating</p>

			<p class="text-uppercase fst-italic">Summary</p>
			<p><?= esc($book['summary']) ?></p>
			
			<hr>
			<p class="mb-1">Publisher: <?= esc($book['publisher']) ?></p>
			<p class="mb-1">Release Date: <?= esc($book['release_date']) ?></p>
			<a class="mb-1 link-dark"
				href="<?php echo base_url() ?>/browse/<?= esc($book['category'], 'url') ?>">
				Category: <?= esc($book['category']) ?>
			</a>
		</div>
	</div>
	
	<hr>

	<div class="row">
		<div class="col-12 col-md-8 col-lg-9 order-3 order-sm-3">
			<div class="d-flex flex-row justify-content-between align-items-center">
				<p class="fs-3 fw-light">Reviews</p>
				<?php if(session()->get('isLoggedIn')): ?>
					<button class="btn btn-dark h-75" onclick="addReview()">Add review</button>
				<?php endif ?>
			</div>
			
			<div id="add-review">
				<div class="card mb-2" id='card-form' style="display:none">
					<div class="card-body">
						<form action="<?php echo base_url()?>/save-review/<?= esc($book['id']) ?>" method="post" id="save-review">
							<?= csrf_field() ?>
							<div class="mb-1">
								<label for="title" class="form-label">Title</label>
								<input type="text" class="form-control" name="title" placeholder="Title" required/>
								
								<label for="review" class="form-label">Review</label>
								<textarea class="form-control" name="review" rows="6" required></textarea>
								
								<div class='d-flex justify-content-end'>
									<button type="button" class="btn btn-secondary mt-2 me-2" onclick="closeReview()">Cancel</button>
									<input type="submit" class="btn btn-outline-dark mt-2" value="Post Review" />
								</div>
							</div>							
						</form>
					</div>
				</div>
			</div>
			
			<div>	
				<?php if ((!empty($reviews) && is_array($reviews)) && (!empty($users) && is_array($users))): ?>	
					<?php $revIndex = 0; ?>
					<?php foreach ($reviews as $review): ?> 
						<div class="card mb-2">
							<div class="card-body">
								<div class="d-flex flex-row">
									<div class="d-flex flex-column align-items-center px-2">
										<?php if ($users[$revIndex]['profilePic'] == NULL): ?>
											<img class="rounded-circle"
												src="<?=base_url('profilePics')?>/default_profile.jpg" width="80px" height="80px">
										<?php else: ?>
											<img class="rounded-circle"
												src="<?=base_url('profilePics')?>/<?php print_r($users[$revIndex]['profilePic'])?>" width="80px" height="80px">
										<?php endif ?>
										<p class="mb-2"><?php print_r($users[$revIndex]['username'])?></p>
										<p class="m-0">Rating</p>
									</div>
									<div class="flex-fill ms-3">
										<p class="fw-bold"><?= esc($review['title']) ?></p>
										<p><?= esc($review['review']) ?></p>
									</div>
								</div>
								<p class="mt-1 mb-0 text-secondary"><?= esc($review['created_at']) ?></p>
							</div>
						</div>
						<?php $revIndex++; ?>
					<?php endforeach ?>
				<?php endif ?>
				
			</div>
			
		</div>
		
		<div class="col-12 col-md-4 col-lg-3 order-4 order-sm-4">
			<div class="card">
				<div class="card-body">
					<p class="fs-5 fw-bold">Recently added in <?= esc($book['category']) ?></p>

					<div class="row">
					<?php if ((!empty($similarBooks) && is_array($similarBooks)) && (!empty($similarCovers) && is_array($similarCovers))): ?>
						<?php $index = 0; ?>
						<?php foreach ($similarBooks as $books_item): ?>
							<a class="col-6 col-md-12 col-xl-6 py-2 px-1"
								href="<?php echo base_url() ?>/book/<?= esc($books_item['id'], 'url') ?>/<?= esc($books_item['slug'], 'url') ?>">
								<figure class="figure pb-2 mb-1 h-100 d-flex flex-column align-items-center">
									<img class="align-middle h-auto cover border-0 img-fluid"
										src="<?=base_url('covers')?>/<?php print_r($similarCovers[$index]['file_name'])?>" width="120px">
									<figcaption class="figure-caption"><?= esc($books_item['title']) ?></figcaption>
								</figure>
							</a>
							<?php $index++; ?>
						<?php endforeach ?>
					<?php else: ?>
						<p>Unable to find similar books for you.</p>
					<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>

<script>
	function addReview(){
		formOpen = document.getElementById('card-form').style.display;
		if (formOpen == "none"){		
			document.getElementById('card-form').style.display = "block";				
		} else {
			closeReview();
		}
	}

	function closeReview(){
		document.getElementById('card-form').style.display = "none";
	}	
</script>

<script>	
	
	$('input[id=to-read]').change(function() {
		checkpoint = document.getElementById("to-read");
		list = checkpoint.defaultValue;	
		updateList(list);
	});
	
	$('input[id=reading]').change(function() {
		checkpoint = document.getElementById("reading");
		list = checkpoint.defaultValue;
		updateList(list);
	});
	
	$('input[id=complete]').change(function() {
		checkpoint = document.getElementById("complete");
		list = checkpoint.defaultValue;
		updateList(list);
	});
	
	function updateList(list){
		// Fetch data
		fetch('https://mi-linux.wlv.ac.uk/~1801448/bookhood/public/index.php/ajax/updatelist/' + <?= esc($book['id']) ?> + '/' + list + '/' + <?= esc(session()->get('id')) ?>)
		.then(response => response.json())
		.then(response => {				
			console.log(response);
		})
		.catch(err => {
			// Display errors in console
			console.log(err);
		});
	}
</script>