<!DOCTYPE html>
<html>
<head>
    <title>Mail to user</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<!-- HEADER -->
<header class="header">
    <div class="container">
        <h1>Main Header Here</h1>
        <h2>
            <small>And small sub header</small>
        </h2>
    </div>
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav class="page-navigation">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/Admin/AddNews">Add news</a></li>
            <li><a href="/Admin/ViewLogs">View logs</a></li>
            <li><a href="/Admin/Mail">MailUser</a></li>
        </ul>
    </div>
</nav>
<!-- /NAVIGATION -->
<!-- MAIN SECTION-->
<main>
    <form action="/Admin/Mail" method="post">
        <label for="title">Тема письма</label>
        <input type="text" id="title" name="title" width="400">
        <br><br>
        <label for="body">Текст письма</label>
        <p><textarea id="body" name="body" rows="10" cols="80"></textarea></p>
        <br>
        <input type="submit">
    </form>
</main>
<!-- /MAIN SECTION-->
<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <p>Copyright © Example.com 2016</p>
    </div>
</footer>
<!-- /FOOTER -->
</body>
</html>