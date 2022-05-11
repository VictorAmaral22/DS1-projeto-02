<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Edit Categoria</title>
</head>
<body style='color:white; font-size:20px'>    
<form action=<?php echo "/consoles/edit/$data[id]";?> method="post">
        <input type="hidden" name="id" value='<?php echo "$data[id]";?>'>
        Nome: <input type="text" name="nome" value='<?php echo "$data[nome]";?>' >
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>