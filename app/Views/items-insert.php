<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Inserir Item</title>
</head>
<body style='color:white; font-size:20px'>    
    <form action="/adicionarProduto" method="post">
        <input type="hidden" name="id">
        Nome: <input type="text" name="nome" >
        <br>
        categoria:
        <select name="categoria">
            <?php 
            foreach($categoria as $c) {
                echo "<option value=$c[id]>$c[nome]</option>";
            }
            ?>
        </select>
        <br>
        Descrição:<textarea style='height:100px;width:800px' type="text" name="descricao"></textarea>
        <br>
        Preço:<input type="text" name="preco">
        <br>
        quantidade:<input type="number" name="quantidade">
        <br>
        imagem:<input type="text" name="imagem">
        <br>
        console:
        <select name="console">
            <?php 
                foreach($console as $c) {
                    echo "<option value=$c[id] selected>$c[nome]</option>";
                }            
            ?>    
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>