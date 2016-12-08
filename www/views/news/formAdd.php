<form action="/index.php?ctrl=Admin&act=AddNews" method="post" enctype="multipart/form-data">
    <label for="title">Название новости</label>
    <input type="text" id="title" name="title" width="400">
    <br><br>
    <label for="article">Текст новости</label>
    <p><textarea id="article" name="article" rows="10" cols="80"></textarea></p>
    <br>
    <input type="submit">
</form>