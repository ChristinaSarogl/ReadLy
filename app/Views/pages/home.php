<?php if (! empty($books) && is_array($books)): ?>

    <?php foreach ($books as $books_item): ?>

        <h3><?= esc($books_item['title']) ?></h3>

        <div class="main">
            <?= esc($books_item['author']) ?>
        </div>
        <p><a href="<?php echo base_url() ?>/books/<?= esc($books_item['slug'], 'url') ?>">View Book</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>