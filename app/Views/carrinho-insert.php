<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Inserir Item</title>
</head>
<body style='font-size:20px'>   
    <p>Compra de produtos para cliente.</p>
    <form action="/adicionarProduto" method="post">
        <label for="">Cliente
            <input type="hidden" name="id">
            <input list='user' type="text" name="user">
            <datalist type="text" name="user" >
            <?php 
            foreach($user as $c) {
                echo "<option value=$c[id]>$c[nome]</option>";
            }
            ?>
            </datalist>
        </label>
        <label for="">Adicionar jogo
            <input type="hidden" name="id">
            <input list='games' type="text" name="games">
            <datalist type="text" name="games" >
            <?php 
            foreach($games as $c) {
                echo "<option value=$c[id]>$c[nome] ($c[console])</option>";
            }
            ?>
            </datalist>
        </label>
        <input type="number" name="quant" maxlength="2">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>