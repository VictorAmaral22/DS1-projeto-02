<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Inserir Console</title>
</head>
<body style='font-size:20px'>    
    <form action="/consoles/create" method="post">
        <input type="hidden" name="id">
        Nome: <input type="text" name="nome" >
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>