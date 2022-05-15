<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChurchGames</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        #flex {
            display: flex;
            flex-direction: column;
            flex: 1;
            margin-left:10px
        }

        .game-container {
            margin: 15px 0px 15px 0px;
            display: flex;
            flex-direction: row;
            justify-content: start;
            align-items: center; 
            text-decoration: none;
            width: 100%;
        }

        .game-cover {
            width: 150px;
            height: 150px;
            background-position: center;
            background-size: cover;
            transition: all ease 0.2s;
        }

        .game-container p {
            color: black;
            font-size: 15px
        }

        #adminOpsions{
            margin-left: 50px;
        }

        .column {
            display: flex;
            flex-direction: column;
            line-height: 0.7px;
        }
    </style>
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
    <h1> Lista de notas fiscais </h1>
    <!-- <div style='display:flex'>
        <p>Adicionar novo</p> 
        <a href="/users/create" class="link-plus">
            <img src="/images/plus.png" class="plus-button-img">
        </a>
    </div> -->
<?php
                foreach($notasFiscais as $row){
                        echo "<p>Usuário de Id: $row[usuario]</p>";
                        foreach($nota['produtos'] as $product){
                            echo "<div class=game-cover style='background-image: url('$product[imagem]'); cursor: pointer;'></div>";
                            echo "<p>$product[nome]</p>";
                        }
                        echo "<p>Valor total: $product[valor]</p>";
                }
                echo "<h1> Lista de usuários com mais gastos </h1>";
                echo "<table>";
                // sort($users,'totalGasto',"DESC");
                foreach($users as $row){
                    echo "<tr>";
                    echo "<td>Usuário</td>";
                    echo "<td>Gasto total</td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>".$row['nome'].'</td>';
                        echo "<td>".$row['totalGasto'].'</td>';
                    echo "</tr>";
                }
                echo "</table>";
            ?>    
            <br>
    </main>

</body>

</html>