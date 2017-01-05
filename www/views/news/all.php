<!DOCTYPE html>
<html>
<head>
    <title>News today</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css" type="text/css" >
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
    <div class="container">
        <h2 class="collection-title">News Collection <small>Visualize Quality</small></h2>
        <div class="collections">
            <?php foreach ($items as $item): ?>



                <div class="collection-item-outer">
                    <div class="collection-item">
                        <div class="collection-text">
                            <a href="/news/<?php echo $item->id?>">
                                <h3><?php echo $item->title ?></h3>
                            </a>
                            <p name="text"><?php echo nl2br($item->text) ?></p>
                            <small><?php echo $item->add_news ?></small><br>
                            <form action="/Admin/DelNews" method="post" style="display: inline-block">
                                <button name="del" value="<?php echo $item->id?>">Delete</button>
                            </form>
                            <form action="/Admin/EditNews" method="post" style="display: inline-block">
                                <button name="edit" value="<?php echo $item->id?>">Edit</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
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