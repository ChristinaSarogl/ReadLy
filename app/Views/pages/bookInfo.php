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
				<button class="btn btn-dark h-75">Add review</button>
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