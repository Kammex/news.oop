<!DOCTYPE html>
<html>
<head>
    <title>Errors logs</title>
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
            <li><a href="/index.php?ctrl=Admin&act=AddNews">Add news</a></li>
            <li><a href="/index.php?ctrl=Admin&act=ViewLogs">View logs</a></li>
        </ul>
    </div>
</nav>
<!-- /NAVIGATION -->
<!-- MAIN SECTION-->
<main>
    <div class="collections">
        <table border="2">
            <tr>
                <th>Number</th>
                <th>Time</th>
                <th>Message</th>
                <th>Code</th>
                <th>Place</th>
            </tr>
            <?php foreach ($items as $key => $item): ?>
                <tr>
                    <td><?php echo $key + 1;?></td>
                    <td><?php echo $item[0];?></td>
                    <td><?php echo $item[1];?></td>
                    <td><?php echo $item[2];?></td>
                    <td><?php echo $item[3];?></td>
                </tr>
            <?php endforeach;?>
        </table>
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

