<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Inserir Item</title>
</head>
<body>
    <header>
        <div
            id="header-title"
            style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
            <div style='display:flex;'>
                <h1>ChurchGames</h1>
                <img src="/images/search.png" class="img-search">
            </div>
            <div style="display: flex; width: 40%; justify-content: space-evenly;">
                <a href="/">Jogos</a>
                <a href="/users/view">Usuarios</a>
                <a href="/categorias/view">Categorias</a>
                <a href="/consoles/view">Consoles</a>
                <a href="/notasfiscais/view">Notas Fiscais</a>
                <a href="/carrinho/view">Carrinho</a>
            </div>
        </div>
    </header>
    <form action="/adicionarProduto" method="post" style='font-size:20px'>
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