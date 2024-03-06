<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>
    <?php foreach ($posts as $post): ?>
        <article>
            <h1>
                <a href="/posts/<?= $post->slug; ?>"><?= $post->title; ?></a>
            </h1>
            <div>
                <p><?= $post->excerpt; ?></p>
            </div>
        </article>
    <?php endforeach; ?>
</body>
</html>