<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChurchGames</title>
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
    <div id="header-title">
        <h1>ChurchGames</h1>
    </div>
</header>
<main>    
    <h3>Lista dos games disponiveis</h3>
   <!-- if(user && user.tipo == 1){
        <a href="games/add" >Cadastrar novo jogo</a>
    } -->
    <div style='margin-bottom:20px'>
        <select name="console">
            <?php 
            foreach($console as $c) {
                    echo "<option value=$c[id]>$c[nome]</option>";
                }
            
            ?>    
        </select>
        <a id="ordenar" href="">Filtrar</a>
        <form method="post" action="">
            <input type='submit' type="text" name='search'>
        </form>
    </div>
    <div id="flex">
       <?php foreach ($data as $jogo) { ?>
            <div class="game-container">
                <div style=" background-image: url('<?php echo $jogo['imagem']?>'); cursor: pointer;" class="game-cover"></div>
                <div class="column">
                    <p>Nome: <?php echo $jogo['nome']?></p>
                    <p>Categoria: <?php echo $jogo['nomeCategoria']?> </p>
                    <p>Console: <?php echo $jogo['nomeConsole']?></p>
                    <!-- <p>descrição:<?php echo $jogo['descricao']?></p> -->
                    <p>Preço: <?php echo $jogo['preco']?></p>
                    <p>Quantidade: <?php echo $jogo['quantidade']?></p>
                </div>
                <?php echo "<a style='margin-right:20px; margin-left:20px' href=/editarProduto/$jogo[id]>Editar</a>"?>
                <?php echo "<a href=/deletarProduto/$jogo[id]>Remover</a>"?>
            </div>
    <?php } ?>
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