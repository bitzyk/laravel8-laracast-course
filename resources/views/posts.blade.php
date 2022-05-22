<!doctype html>

<title>My Blog</title>

<body>
    <?php foreach($posts as $postContent): ?>
    <article>
        <?= $postContent; ?>
    </article>
    <?php endforeach; ?>
</body>
