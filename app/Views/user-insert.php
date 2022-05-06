<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Inserir Usuário</title>
</head>
<body style='color:white; font-size:20px'>    
    <form action="/users/add" method="post">
        Nome: <input type="text" name="nome" >
        <br>
        Email: <input type="text" name="email">
        <br>
        Senha:<input type="password" name="senha">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>