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
				<?php if(session()->get('isLoggedIn')): ?>
					<button class="btn btn-dark h-75" onclick="addReview()">Add review</button>
				<?php endif ?>
			</div>
			
			<div id="add-review"></div>
			
			<div>			
				<div class="card mb-2">
					<div class="card-body">
						<div class="d-flex flex-row">
							<div class="px-2">
								<img class="rounded-circle" src="books.jpg" width="80px" height="80px">
								<p class="mb-2">Username</p>
								<p class="m-0">Rating</p>
							</div>
							<div class="flex-fill ms-3">
								<p>Illuminating ... [Nicolson] operates in a tradition pioneered by Annie Dillard and upheld by the likes of David Haskell — closely observing a discrete patch of earth (or sea) and taking it as his muse ... Not that he’s a passive watcher. Nicolson engineers his own pools in a Scottish bay, 'gardening the sea' with crowbars and mortar, then evokes their tiny inhabitants in lovely detail. He’s fascinated by the adaptations that permit life in this 'Darwinian laboratory' ... There’s brutality here, but also brilliance — anemones, despite literal brainlessness, adeptly size up their rivals — and astonishing tenderness ... The notion of dredging big truths from small pools isn’t novel ... But few writers have done it with Nicolson’s discursive erudition. He introduces a litany of scientists who have sought universality in tide pools, these accessible, self-contained aquariums ... Nicolson’s at his best when he’s focused on his precious littoral world. Here, even rocks have stories.</p>
							</div>
						</div>
						<p class="m-0 text-secondary">Date</p>
					</div>
				</div>
				
				<div class="card mb-2">
					<div class="card-body">
						<div class="d-flex flex-row">
							<div class="px-2">
								<img class="rounded-circle" src="books.jpg" width="80px" height="80px">
								<p class="mb-2">Username</p>
								<p class="m-0">Rating</p>
							</div>
							<div class="flex-fill ms-3">
								<p>Illuminating ... [Nicolson] operates in a tradition pioneered by Annie Dillard and upheld by the likes of David Haskell — closely observing a discrete patch of earth (or sea) and taking it as his muse ... Not that he’s a passive watcher. Nicolson engineers his own pools in a Scottish bay, 'gardening the sea' with crowbars and mortar, then evokes their tiny inhabitants in lovely detail. He’s fascinated by the adaptations that permit life in this 'Darwinian laboratory' ... There’s brutality here, but also brilliance — anemones, despite literal brainlessness, adeptly size up their rivals — and astonishing tenderness ... The notion of dredging big truths from small pools isn’t novel ... But few writers have done it with Nicolson’s discursive erudition. He introduces a litany of scientists who have sought universality in tide pools, these accessible, self-contained aquariums ... Nicolson’s at his best when he’s focused on his precious littoral world. Here, even rocks have stories.</p>
							</div>
						</div>
						<p class="m-0 text-secondary">Date</p>
					</div>
				</div>
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
		reviewsSection = document.getElementById('add-review');
		formOpen = document.getElementById('form-open');
		if (formOpen == null){		
			card = document.createElement('div');
			card.setAttribute('class','card mb-2');
			card.setAttribute('id','form-open');
			
			cardBody = document.createElement('div');
			cardBody.setAttribute('class','card-body');

			form = document.createElement('form');

			inputDiv = document.createElement('div');
			inputDiv.setAttribute('class','mb-3');

			labelTitle = document.createElement('label');
			labelTitle.setAttribute('class','form-label');
			labelTitle.innerHTML = "Title";

			title = document.createElement('input');
			title.setAttribute('class','form-control');
			title.setAttribute('type','text');
			title.setAttribute('placeholder','Title');

			labelReview = document.createElement('label');
			labelReview.setAttribute('class','form-label');
			labelReview.innerHTML = "Review";

			textareaReview = document.createElement('textarea');
			textareaReview.setAttribute('class','form-control');
			textareaReview.setAttribute('rows','7');

			submitDiv = document.createElement('div');
			submitDiv.setAttribute('class','d-flex justify-content-end');

			submitReview = document.createElement('input');
			submitReview.setAttribute('class','btn btn-outline-dark mt-2');
			submitReview.setAttribute('type','submit');
			submitReview.setAttribute('value','Post Review');

			cancelButton = document.createElement('button');
			cancelButton.setAttribute('type','button');
			cancelButton.setAttribute('class','btn btn-secondary mt-2 me-2');
			cancelButton.setAttribute('onclick','closeReview()');
			cancelButton.innerHTML = "Cancel";
			 
			submitDiv.append(cancelButton);
			submitDiv.append(submitReview);

			inputDiv.append(labelTitle);
			inputDiv.append(title);
			inputDiv.append(labelReview);
			inputDiv.append(textareaReview);
			inputDiv.append(submitDiv);

			form.append(inputDiv);
			cardBody.append(form);
			card.append(cardBody);		
			reviewsSection.append(card);	
		} else {
			closeReview();
		}
	}

	function closeReview(){
		review = document.getElementById("add-review");
		while (review.firstChild) {
			review.removeChild(review.lastChild);
		}
	}
</script>