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
    <div id="header-title" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
        <h1>ChurchGames</h1>
        <div style="display: flex; width: 40%; justify-content: space-evenly;">
            <a href="/">Jogos</a>
            <a href="/users">Usuarios</a>
            <a href="/">Categorias</a>
            <a href="/">Consoles</a>
            <a href="/">Itens</a>
        </div>
    </div>
</header>
<main>    
    <h3>Lista dos games disponiveis</h3>
    <a href="/adicionarProduto">Adicionar Jogo</a>
   <!-- if(user && user.tipo == 1){
        <a href="games/add" >Cadastrar novo jogo</a>
    } -->
    <div style='margin-bottom:20px'>
        <select name="console">
            <?php 
            // foreach($console as $c) {
                    // echo "<option value=$c[id]>$c[nome]</option>";
                // }            
            ?>    
        </select>
        <!-- <form method="post" action="">
            <input type='submit' type="text" name='search'>
        </form> -->
    </div>
    <div id="flex">
       <?php foreach ($data as $user) { ?>
            <div class="game-container">
                <div class="column">
                    <p>Nome: <?php echo $user['nome']?></p>
                    <p>email: <?php echo $user['email']?></p>
                    <p>dataregist: <?php echo $user['dataregist']?></p>
                </div>
                <?php echo "<a style='margin-right:20px; margin-left:20px' href=/editarProduto/$user[id]>Editar</a>"?>
                <?php echo "<a href=/deletarProduto/$user[id]>Remover</a>"?>
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