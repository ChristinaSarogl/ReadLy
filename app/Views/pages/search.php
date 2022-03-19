<div class="container pb-3" style="background: #ebebeb;">
	<div class="d-flex align-items-end pt-3">
		<p class="fs-2 fw-light m-0">Search Results</p>
		<p class="text-secondary mb-2 ms-2">(<?php echo count($books)+count($authors)+count($publishers) ?> results)</p>
	</div>
	<hr>
	<div class="d-none d-md-inline">
		<ul class="nav nav-tabs mt-4">
			<li class="nav-item">
			  <button class="nav-link active">Books</button>
			</li>
			<li class="nav-item">
				<button class="nav-link link-dark">Authors</button>
			</li>
			<li class="nav-item">
				<button class="nav-link link-dark">Publishers</button>
			</li>
		</ul>
	</div>
	
	<!-- Mobile -->
	<div class="d-md-none bg-white mt-2 mx-1">
		<select class="form-select" id="mobileSelect">
			<option value="1" selected>Books</option>
			<option value="2">Authors</option>
			<option value="3">Publishers</option>
		</select> 
	</div>
	
	<div class="pt-2 bg-white"> 
		<div class="row mx-0">
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
				<a class="col-6 col-sm-4 col-lg-2 py-2 px-1 text-center" 
					href="<?php echo base_url() ?>/book/<?= esc($books_item['id'], 'url') ?>/<?= esc($books_item['slug'], 'url') ?>">
					<figure class="figure pb-2 mb-1 h-100 d-flex flex-column align-items-center">
						<img class="align-middle h-auto cover border-0 img-fluid"
							src="<?=base_url('covers')?>/<?php print_r($covers[$index]['file_name'])?>" width="140px">
						<figcaption class="figure-caption"><?= esc($books_item['title']) ?></figcaption>
					</figure>
				</a>
				<?php $index++; ?>
			<?php endforeach ?>
		</div>
	</div>
	
</div>