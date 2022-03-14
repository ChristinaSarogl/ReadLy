<div class="container-fluid py-0" style="background: #ebebeb;">
	<div class="container py-3">		
		<?php if ((!empty($books) && is_array($books)) && (!empty($covers) && is_array($covers))): ?>
		
			<div class="d-flex justify-content-center">
				<p class="bg-dark text-wrap px-3 rounded text-white fs-4 text-uppercase">Latest realises</p>
			</div> 
			
			<div id="latestReleases" class="carousel slide" data-wrap="false" data-bs-interval="false">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row mx-0">
		
							<?php $index = 0; ?>
							<?php foreach ($books as $books_item): ?> 		
								<div class="col-6 col-sm-4 col-lg-2 py-2 px-1 text-center">
								  <figure class="figure pb-2 mb-1 h-100 d-flex flex-column align-items-center">
									<img class="align-middle h-auto cover border-0 img-fluid"
										src="<?=base_url('covers')?>/<?php print_r($covers[$index]['file_name'])?>" width="140px">
									<figcaption class="figure-caption"><?= esc($books_item['title']) ?></figcaption>
								  </figure>
								</div>
							
								<?php $index++; ?>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			<div>

		<?php else: ?>

			<h3>No Books</h3>

			<p>Unable to find any books for you.</p>

		<?php endif ?>
	</div>
</div>