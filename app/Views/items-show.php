<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChurchGames</title>
    <link rel="stylesheet" href="/css/styles.css">
    <body style='margin-left:20px'>
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
        <main class='grid'>
            <!-- if(user && user.tipo == 1){
        <a href="games/add" >Cadastrar novo jogo</a>
    } -->
            <div class='grid-a'>
                <div class='columm'>
                    <h2>Consoles</h2>
                    <div>
                        <?php foreach($console as $c) { 
                            if(isset($_GET['filter']) && $_GET['filter'] == $c['id']) echo "<b><a class='categorias' href='/?filter=$c[id]' value=$c[id]>$c[nome]</a></b> <br>"; 
                            else echo "<a class='categorias' href='/?filter=$c[id]' value=$c[id]>$c[nome]</a> <br>"; 
                        } ?>
                    </div>
                    <h2>Categorias</h2>
                    <div>
                        <?php foreach($categoria as $c) { 
                            if(isset($_GET['category']) && $_GET['category'] == $c['id']) echo "<b><a class='categorias' href='/?category=$c[id]' value=$c[id]>$c[nome]</a></b> <br>"; 
                            else echo "<a class='categorias' href='/?category=$c[id]' value=$c[id]>$c[nome]</a> <br>";
                        } ?>
                    </div>
                </div>
                <a href="/adicionarProduto">Cadastrar novo jogo</a>
            </div>
            <div class='grid-b'>
                <div
                    style='margin-left:15px; margin-right:15px; display:flex; flex-direction: row; justify-content:space-between; width:94%; align-items: center;'>
                    <form method="get" action="/">
                        <input type="text" name='search' placeholder="Faça uma pesquisa ...">
                        <button type='submit'>Pesquisar</button>
                    </form>
                    <?php 
                        if(isset($_GET['search'])){
                            echo "<div style=\"display: flex; flex-direction: row; align-items: center; text-align: center;\">";
                            echo "<p style=\"margin-right: 10px;\">você pesquisou por </p>";
                            echo "<h2>";
                            echo "\"$_GET[search]\"";
                            echo "</h2>";
                            echo "</div>";
                        }
                        if(isset($_GET['order'])){
                            echo "<div style=\"display: flex; flex-direction: row; align-items: center; text-align: center;\">";
                            echo "<p style=\"margin-right: 10px;\">ordernado por </p>";
                            echo "<h2>";
                            if($_GET['order'] == 'QuantDesc'){
                                echo "quantidade decrescente";
                            }
                            if($_GET['order'] == 'PriceDesc'){
                                echo "preço decrescente";
                            }
                            if($_GET['order'] == 'PriceAsc'){
                                echo "preço crescente";
                            }
                            echo "</h2>";
                            echo "</div>";
                        }
                        if(isset($_GET['category'])){
                            echo "<div style=\"display: flex; flex-direction: row; align-items: center; text-align: center;\">";
                            echo "<p style=\"margin-right: 10px;\">filtrado por </p>";
                            echo "<h2>";
                            foreach ($categoria as $value) {
                                if($value['id'] == $_GET['category']) echo $value['nome'];
                            }
                            echo "</h2>";
                            echo "</div>";
                        }
                        if(isset($_GET['filter'])){
                            echo "<div style=\"display: flex; flex-direction: row; align-items: center; text-align: center;\">";
                            echo "<p style=\"margin-right: 10px;\">filtrado por </p>";
                            echo "<h2>";
                            foreach ($console as $value) {
                                if($value['id'] == $_GET['filter']) echo $value['nome'];
                            }
                            echo "</h2>";
                            echo "</div>";
                        }
                    ?>
                    <div>
                        <div
                            style='cursor:pointer; align-self:center'
                            onClick="document.getElementById('id01').style.display='flex'">Ordenar</div>
                        <div id='id01' style='display:none;'>
                            <div
                                onClick="document.getElementById('id01').style.display='none'"
                                style='align-self:flex-end; cursor:pointer; font-size:20px'>X</div>
                            <a href='/?order=QuantDesc' class='noDecoration'>Maior quantidade</a>
                            <a href='/?order=PriceDesc' class='noDecoration'>Maiores preços</a>
                            <a href='/?order=PriceAsc' class='noDecoration'>Menores Preços</a>
                        </div>
                    </div>
                </div>
                <div id="flex">
                    <?php foreach ($data as $jogo) { ?>
                    <div class="game-container">
                        <div
                            style=" background-image: url('<?php echo $jogo['imagem']?>'); cursor: pointer;"
                            class="game-cover"></div>
                        <div class="column">
                            <p class='title'><?php echo $jogo['nome']?></p>
                            <p class='category'>Categoria:
                                <?php echo $jogo['nomeCategoria']?>
                            </p>
                            <p class='console'>Console:
                                <?php echo $jogo['nomeConsole']?></p>
                            <!-- <p>descrição:<?php echo $jogo['descricao']?></p> -->
                            <p class='title'>R$<?php echo $jogo['preco']?>,00</p>
                            <p class='quant'>Restantes:
                                <?php echo $jogo['quantidade']?></p>
                        </div>
                        <div style='display:flex'>
                            <?php echo "<td><a style='margin-right:10px; margin-left:10px'
                            href='/editarProduto/$jogo[id]'><img src=/images/edit.png
                            class=plus-button-img></a></td>";?>
                            <?php echo "<td><a href='/deletarProduto/$jogo[id]'><img src=/images/minus.png
                            class=plus-button-img></a></td>";?>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </main>

</body>

</html>