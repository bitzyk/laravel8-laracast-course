<!doctype html>

<title>My Blog</title>

<body>
<?php /** @var \App\Models\Post[] $posts */
    foreach($posts as $post): ?>
    <article>
        <h1>
            <a href="/post/<?= $post->getSlug(); ?>"><?= $post->getTitle(); ?></a>
        </h1>
        <p><?= $post->getExcerpt(); ?></p>
    </article>
    <?php endforeach; ?>
</body>
