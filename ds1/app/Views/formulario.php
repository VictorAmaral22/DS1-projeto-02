<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Add Items</title>
</head>
<body style='color:white; font-size:20px'>
<?= $validation->listError() ?>
    <form action="/enviar" method="post">
        Nome:<input type="text" name="nome" id="">
        <br>
        Idade:<input type="text" name="idade" id="">
        <br>
        Descrição:<input type="text" name="descr" id="">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>