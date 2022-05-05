<!-- Fazer a tabela e poder editar e remover, e inserir na própria pagina !--><!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChurchGames</title>
    <link rel="stylesheet" href="css/styles.css">
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
        <h1>ChurchGames</h1>
        <div style="display: flex; width: 40%; justify-content: space-evenly;">
            <a href="/">Jogos</a>
            <a href="/users">Usuarios</a>
            <a href="/categorias">Categorias</a>
            <a href="/consoles">Consoles</a>
        </div>
    </div>
</header>
<main>    
   <!-- if(user && user.tipo == 1){
        <a href="games/add" >Cadastrar novo jogo</a>
    } -->
    <div>
        <div align="center">
        <div style='display:flex'>
        <p>Adicionar novo</p> 
        <a href="/categorias/create" class="link-plus">
            <img src="/images/plus.png" class="plus-button-img">
        </a>
            <?php
                echo "<table>";
                echo "<tr>";
                echo "<td>Nome</td>";
                echo  "<td>Editar</td>";
                echo "<td>Excluir</td>";
                echo "</tr>";
                foreach($data as $row){
                    echo "<tr>";
                        echo "<td>".$row['nome'].'</td>';
                        echo "<td><a href='/categories/edit/$row[id]'><img src=/images/edit.png class=plus-button-img></a></td>";
                        echo "<td><a href='/categories/delete/$row[id]'><img src=/images/minus.png class=plus-button-img></a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>    
            <br>
        </div>

        
    </div>
    <script>
        const select=document.getElementById('select');
        const link=document.getElementById('filter-link');
        select.onchange=()=>{
            const rota=`/games/?genero=${select.value}`;
            link.href=rota;
        }
        const select2=document.getElementById('data');
        const link2=document.getElementById('ordenar');
        select2.onchange=()=>{
            const rota2=`/games/?data=${select2.value}`;
            link2.href=rota2;
        }
    </script>
    </main>

</body>

</html>