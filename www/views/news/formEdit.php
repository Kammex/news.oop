<form action="/index.php?ctrl=Admin&act=EditNews" method="post">
    <input type="hidden" name="id" value="<?php echo $_POST['edit']?>">
    <label for="title">Название новости</label>
    <input type="text" id="title" name="title" width="400" value="<?php echo $item->title;?>">
    <br><br>
    <label for="article">Текст новости</label>
    <p><textarea id="article" name="article" rows="10" cols="80"><?php echo $item->text;?></textarea></p>
    <br>
    <input type="submit">
</form>