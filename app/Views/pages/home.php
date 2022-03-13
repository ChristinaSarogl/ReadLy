<?php if ((!empty($books) && is_array($books)) && (!empty($covers) && is_array($covers))): ?>
	
	<?php for ($x = 0; $x < count($books); $x++) {
	  echo "The number is: $x <br>";
	} ?>
	
	<?php $index = 0;

	foreach ($books as $books_item): ?> 

		<h3></h3>

		<div class="main">
			<?= esc($books_item['author']) ?>
		</div>
		<p><a href="<?php echo base_url() ?>/books/<?= esc($books_item['slug'], 'url') ?>">View Book</a></p>
		
		<div class="col-6 col-sm-4 col-lg-2 py-2 px-1 text-center">
		  <figure class="figure pb-2 mb-1 h-100 d-flex flex-column align-items-center">
			<img class="align-middle h-auto cover border-0 img-fluid" src="<?=base_url('covers/' + covers[index]['file_name'])?>" width="140px">
			<figcaption class="figure-caption"><?= esc($books_item['title']) ?></figcaption>
		  </figure>
		</div>
	
		<?php $index++; ?>
	<?php endforeach ?>
	

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>