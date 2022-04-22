<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>ChurchGames</title>
    <style>
        #flex {
    display: flex;
    flex-direction: column;
    flex: 1;
}

.game-container {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; 
    margin-right: 80px;
    margin-left: 80px;
    margin-bottom: 50px;
    border: 1px solid black;
    background-color: black;
    text-decoration: none;
    width: 150px;
    height: 150px;
}

.game-cover {
    width: 150px;
    height: 150px;
    margin-bottom: 30px;
    background-position: center;
    background-size: cover;
    transition: all ease 0.2s;
}
#row p {
    color: black;
    font-size: 15px
}

#adminOpsions{
    margin-left: 50px;
}
    </style>
<body>
<header>
    <div id="header-title">
        <h1>ChurchGames</h1>
    </div>
</header>
    <h1>Lista dos games disponiveis</h1>
   <!-- if(user && user.tipo == 1){
        <a href="games/add" >Cadastrar novo jogo</a>
    } -->
    <div>
        <p>Filtre os jogos por genero</p>
        <select name="genero" id="select">
            <option value='10'>Todos</option>
            <option value='0'>Ação</option>
            <option value=1>Aventura</option>
            <option value=2>Terror</option>
            <option value=3>Puzzle</option>
            <option value=4>RPG</option>
            <option value=5>Corrida</option>
            <option value=6>Esporte</option>
        </select>
        <a id="filter-link" href="">Filtrar</a>
        <a href="/games" style="margin-left:10px">Limpar</a>

    </div>
    <div>
        <p>Ordenar por data</p>
        <select name="data" id="data">
            <option value=0>deixa assim</option>
            <option value=1>Crecente</option>
            <option value=2>Decrecente</option>
        </select>
        <a id="ordenar" href="">Ordenar</a>
    </div>
    <div id="flex">
       <?php foreach ($arr as &$valor) { ?>
            <div id="row">
            <div style=" background-image: url('<?php echo $valor['image']?>'); cursor: pointer;" id="game-cover-1" class="game-cover">
            </div>
        <div>
        <p>Nome: <?php echo $valor['nome']?></p>
        <p>Categoria: <?php echo $valor['categoria']?> </p>
        <p>Console: <?php echo $valor['console']?></p>
        <p>descrição:<?php echo $valor['descricao']?></p>
        <p>Preço: <?php echo $valor['preco']?></p>
        <p>Quantidade: <?php echo $valor['quantidade']?></p>
    </div>
    <?php } ?>
        <div id="adminOpsions">
            <a>Alterar</a>
            <a>Deletar</a>
        </div>
    </div>
        <% } %>
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
</body>

</html>