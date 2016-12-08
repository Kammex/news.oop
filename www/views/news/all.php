<?php foreach ($items as $item): ?>
    <h1><?php echo $item->title; ?></h1>
    <div><?php echo $item->text; ?>
        <br><br>
        <?php echo $item->add_news; ?></div>
<?php endforeach; ?>