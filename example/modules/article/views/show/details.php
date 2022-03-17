<style><?php include 'details.css' ?></style>
<article>
    <div class="go-back"><a href="/index.php">⮉</a><a href="/article">⮈</a></div>
    <h1><?= $response['title'] ?></h1>
    <div class="article-cont">
        <?= $response['body'] ?>
        <div id="author-name"><?= $response['author']['firstName'] ?>  <?= $response['author']['lastName'] ?></div>
    </div>
</article>

