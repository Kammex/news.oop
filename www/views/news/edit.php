<!DOCTYPE html>
<html>
<head>
    <title>News today</title>
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
<?php include __DIR__ . '/formEdit.php' ?>
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