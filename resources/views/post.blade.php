<!doctype html>

<title>My Blog</title>

<body>

<h1>
    <?= /** @var \App\Models\Post $post */
    $post->getTitle(); ?>
</h1>

<?= $post->getContent(); ?>

</body>
