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
    <div id="header-title" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
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

<p>Compra de produtos para cliente.</p>
       
<?php 
    $countJogos = 1;
    echo "consoles ";
    print_r($console);
    echo "<br>";
    echo "<br>";

    echo "categoria ";
    print_r($categoria);
    echo "<br>";
    echo "<br>";

    echo "itens ";
    print_r($itens);
    echo "<br>";
    echo "<br>";

    echo "users ";
    print_r($users);
    echo "<br>";
?>

<form action="/carrinho/view" method="post">
    <label for="">Cliente
            <input type="hidden" name="id">
            <!-- <input list='usuario' type="text" name="usuario"> -->
            <!-- <datalist type="text" id="usuario" > -->
            <select>
            <?php 
            foreach($users as $c) {
                echo "<option value=$c[id]>$c[email]</option>";
            }
            ?>
            </select>
            <!-- </datalist> -->
        </label>
        <label for="">Adicionar jogo
            <input type="hidden" name="id">
            <!-- <input list='games' type="text" name="games"> -->
            <!-- <datalist type="text" id="games" > -->
            <select>
            <?php 
            foreach($itens as $c) {
                echo "<option class='game$c[id]' value=$c[id]>$c[nome] ($c[nomeConsole])</option>";
            }
            ?>
            
            <!-- </datalist> -->
        </select>
        </label>
        <label> Quantidade
        <input type="number" name="quant" max="2">
        </label>
        <button type='button' onclick='addGame()'>adicionar Jogo</button>
        <div id='games'></div>
    <input type="submit" value="Manda">
</form>
<script>
    function addGame () {
  // cria um novo elemento div
  // e dá à ele conteúdo
  let divAtual = document.getElementById("games");
  var game = document.createElement("p");
  var conteudoNovo = document.createTextNode("Olá, cumprimentos!");
  divNova.appendChild(conteudoNovo); //adiciona o nó de texto à nova div criada


}
</script>
</body>
</html>