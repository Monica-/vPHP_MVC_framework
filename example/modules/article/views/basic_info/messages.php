<style><?php include 'messages.css' ?></style>
<div class="go-back"><a href="/index.php"><span>⮉</span></a></div>
<h1 id="messages-title">Answer:</h1>
<div id="messages-cont">
    <div id="messages" class="<?=$response['error']?'error':''?>">
        <div class="warning">⚠</div>
        <?=$response['message']??''?>
    </div>
</div>

