<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="/css/styles.css">
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
<?php 

$countJogos = 1;

// echo "consoles ";
// print_r($console);
// echo "<br>";
// echo "<br>";

// echo "categoria ";
// print_r($categoria);
// echo "<br>";
// echo "<br>";

// echo "itens ";
// print_r($itens);
// echo "<br>";
// echo "<br>";

// echo "users ";
// print_r($users);
// echo "<br>";

?>

<form action="/carrinho/view" method="post">
    <select name="usuario" >
        <?php 
            foreach ($users as $element) {
                echo "<option value='$element[id]'>$element[email]</option>";
            }
        ?>
    </select>

    <input type="hidden" name="jogo1" value="3">
    <input type="hidden" name="qtd1" value="1">

    <input type="submit" value="Manda">

</form>

</body>
</html>