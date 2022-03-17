<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="rest-cont" class="main-content">
    <h1>RestController</h1>
    <p class="subtitle">
        Shows resource and method called with data received in controller:<br>
        <small>
            - These requests may make no sense in a real app, but show how URI and http method are translated into a
            controller's method call and data<br>
            - The only resources are <b>user</b> and <b>article</b>
        </small>
    </p>
    <p>
        <input type="text" id="uri" value="/user/1/hello/article/2/b">
        <select id="select-method">
            <option value="GET" selected>GET</option>
            <option value="PATCH">PATCH</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
            <option value="POST">POST</option>
        </select>
        <button class="hover">SEND</button>
    </p>
    <p class="subtitle">
        Json answer:
    </p>
    <p>
        <span id="answer"></span>
    </p>
</div>

<div id="verb-cont" class="main-content">
    <h1>VerbController</h1>
    <p>
        <small>The only resources are <b>user</b> and <b>article</b></small>
    </p>
    <p>
        Shows a view:
    </p>
    <p>
        <a href="/article">/<span class="resource">article</span></a>
    </p>
    <p>
        <a href="/article/1">/<span class="resource">article</span>/1</a>
    </p>
    <p>
        <a href="/article/1/modify">/<span class="resource">article</span>/1/<span class="verb">modify</span></a>
    </p>
    <p>
        <a href="/article/modify">/<span class="resource">article</span>/<span class="verb">modify</span></a>
    </p>
    <p>
        <a href="/article/new">/<span class="resource">article</span>/<span class="verb">new</span></a>
    </p>
    <p>
        <a href="/article/1/delete">/<span class="resource">article</span>/1/<span class="verb">delete</span></a>
    </p>
    <p>
        <a href="/user/1/article/2/attach">/<span class="resource">user</span>/1/<span class="resource">article</span>/2/<span
                    class="verb">attach</span></a>
    </p>
    <p class="subtitle">
        Shows resource and method called with data received in controller:<br>
        <small>
            - These requests may make no sense in a real app, but show how URIs are translated into a controller's
            method call and data<br>
        </small>
    </p>
    <p>
        <a href="/article/1/2/3/user/a/b/modify">/<span class="resource">article</span>/1/2/3/<span class="resource">user</span>/a/b/<span
                    class="verb">modify</span></a>
    </p>
    <p>
        <a href="/article/1/2/3/user/a/hello/user/c/d/modify">/<span class="resource">article</span>/1/2/3/<span
                    class="resource">user</span>/a/hello/<span class="resource">user</span>/c/d/<span
                    class="verb">modify</span></a>
    </p>
</div>
<div id="error-cont">
    <div class="message-cont">
        <div class="warning">⚠</div>
        <div class="message"></div>
    </div>
</div>
</body>
<script>  <?php include 'some_previous_checks.php'; ?>  </script>
<script src="js/script.js"></script>
</html>