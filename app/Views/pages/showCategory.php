<div class="container mt-3">
    <div class="container">
		<?php if ((!empty($books) && is_array($books)) && (!empty($covers) && is_array($covers))): ?>
			<div class="d-flex justify-content-center">
				<p class="bg-dark text-wrap px-3 rounded text-white fs-4 text-uppercase">Latest in <?= esc($books[0]['category']) ?></p>
			</div>
				
			<div class="row mx-0">
				<?php $recentIndex = 0; ?>
				<?php foreach ($recentBooks as $recent_books_item): ?> 
					<a class="col-6 col-sm-4 col-lg-2 py-2 px-1 text-center"
						href="<?php echo base_url() ?>/book/<?= esc($recent_books_item['id'], 'url') ?>/<?= esc($recent_books_item['slug'], 'url') ?>">
						<figure class="figure pb-2 mb-1 h-100 d-flex flex-column align-items-center">
						<img class="align-middle h-auto cover border-0 img-fluid"
							src="<?=base_url('covers')?>/<?php print_r($recentCovers[$recentIndex]['file_name'])?>" width="140px">
						<figcaption class="figure-caption"><?= esc($recent_books_item['title']) ?></figcaption>
						</figure>
					</a>
					<?php $recentIndex++; ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<div class="container mt-3" style="background: #ebebeb;">
		<div class="row">			
			<div class="d-flex felx-row justify-content-between align-items-center">
				<p class="my-3 px-3 fs-5 fw-light"><?php echo count($books) ?> books</p>
				<div class="d-flex flex-row align-items-center">
					<p class="m-0 me-2">Sort by: </p>
					<div class="dropdown">
						<button class="btn btn-outline-dark dropdown-toggle px-1 px-sm-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						  New
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						  <li><a class="dropdown-item" href="#">New</a></li>
						  <li><a class="dropdown-item" href="#">Popularity</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<hr>
			
			<?php $index = 0; ?>
			<?php foreach ($books as $books_item): ?> 
				<a class="col-12 col-md-6 col-lg-4 py-2 px-2 d-flex link-dark"
					href="<?php echo base_url() ?>/book/<?= esc($books_item['id'], 'url') ?>/<?= esc($books_item['slug'], 'url') ?>">
					<img class="img-fluid" src="<?=base_url('covers')?>/<?php print_r($covers[$index]['file_name'])?>" width="120px">
					<div class="ms-2">
						<p class="fs-4 mb-1"><?= esc($books_item['title']) ?></p>
						<?php if ($ratings[$index] !== "none"): ?>
							<?php $floorNum = floor($ratings[$index]); ?>
							<?php for ($x = 0; $x < $floorNum; $x++): ?>
								<i class="fa fa-star checked text-warning" style="font-size:20px"></i>
							<?php endfor; ?>	
							<?php for ($x = 0; $x < (5-$floorNum); $x++): ?>
								<i class="fa fa-star-o checked text-secondary" style="font-size:20px"></i>
							<?php endfor; ?>
						<?php else: ?>
							<?php for ($x = 0; $x < 5; $x++): ?>
								<i class="fa fa-star-o checked text-secondary" style="font-size:20px"></i>
							<?php endfor; ?>
						<?php endif; ?>				
					</div>
				</a>
				<?php $index++; ?>
			<?php endforeach ?>
			
	<?php else: ?>

		<h3>No Books in this category</h3>

		<p>Unable to find any books for you.</p>
		
	<?php endif ?>
	
	</div>
</div>