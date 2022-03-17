<style><?php include 'list.css' ?></style>

<h1 id="list-title">Articles list:</h1>
<div id="article-list">
    <?php
    foreach ($response as $article) {
        echo '<div><a href="/article/' . $article['id'] . '">' . $article['title'] . '</a></div>';
    }
    ?>

</div>


