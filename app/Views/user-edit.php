<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Edit Item</title>
</head>
<body style='color:white; font-size:20px'>    
<form action=<?php echo "/users/edit/$data[id]";?> method="post">
        <input type="hidden" name="id" value='<?php echo "$data[id]";?>'>
        Nome: <input type="text" name="nome" value='<?php echo "$data[nome]";?>' >
        <br>
        email:<input type="email" name="email" value=<?php echo "$data[email]";?>>
        <br>
        senha:<input type="text" name="senha" value=<?php echo "$data[senha]";?>>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>