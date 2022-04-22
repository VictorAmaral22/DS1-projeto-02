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
<form action="/postEditProduct" method="post">
        <input type="hidden" name="id" value=<?php echo "$data[id]";?>>
        Nome:<input type="text" name="nome" value=<?php echo "$data[nome]";?> >
        <br>
        categoria:
        <select name="console">
            <?php 
            foreach($categoria as $c) {
                echo "<option value=$c[id]>$c[nome]</option>";
            }
            ?>
    </select>
        <br>
        Descrição:<textarea style='height:100px;width:800px' type="text" name="descricao"><?php echo "$data[descricao]";?></textarea>
        <br>
        Preço:<input type="text" name="preco" value=<?php echo "$data[preco]";?>>
        <br>
        quantidade:<input type="number" name="quantidade" value=<?php echo "$data[quantidade]";?>>
        <br>
        imagem:<input type="text" name="imagem" value=<?php echo "$data[imagem]";?>>
        <br>
        console:
        <select name="console">
            <?php 
            foreach($console as $c) {
                    echo "<option value=$c[id]>$c[nome]</option>";
                }
            
            ?>    
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>