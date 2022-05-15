<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChurchGames</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body style='margin-left:20px'>
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
<main>   
    <h1>Compras de usuários</h1>
    <!-- <div style='display:flex'>
        <p>Adicionar novo</p> 
        <a href="/users/create" class="link-plus">
            <img src="/images/plus.png" class="plus-button-img">
        </a>
    </div> -->
    <div style='display:flex'>
        <?php
                echo "<div class='scrollable'>";
                foreach($notasFiscais as $row){
                        echo "<div class=\"notaContainer\">";
                        echo "<div>";
                        echo "<h2>Usuário: "; 
                        foreach ($users as $user) {
                            if($row['usuario'] == $user['id']) echo $user['email'];
                        }
                        echo "</h2>";
                        echo "<h3>Nota Fiscal: $row[id]</h3>";
                        echo "<h3>Data: $row[data]</h3>";
                        echo "</div>";
                            foreach($row['produtos'] as $product){
                                echo "<div class=\"produtoInfo\">";
                                echo "<p> Código: $product[produto]</p>";
                                echo "<p> ".$product['produtoInfo']['nome']." (".$product['produtoInfo']['nomeConsole'].")</p>";
                                echo "<p> $product[qtd]x </p>";
                                echo "<p> R$ $product[valor]</p>";
                                echo "</div>";
                            }
                        echo "<h2>Valor total: R$ $row[total]</h2>";
                        echo "</div>";
                }
                echo "</div>";
                echo "<div class='alignCenter'>";
                echo "<h1> Lista de usuários com mais gastos</h1>";
                echo "<table align=left>";
                // sort($users,'totalGasto',"DESC");
                echo "<tr>";
                echo "<td>Usuário</td>";
                echo "<td>Gasto total</td>";
                echo "</tr>";

                foreach($users as $row){
                    echo "<tr>";
                        echo "<td>".$row['nome'].'</td>';
                        echo "<td>R$ ".$row['totalGasto'].'</td>';
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
        ?>    
    </div>
            <br>
</main>

</body>

</html>