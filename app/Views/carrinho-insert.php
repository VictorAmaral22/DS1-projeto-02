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

        <h2>Compra de produtos para cliente.</h2>

        <?php $countJogos = 1; 
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
            <label for="usuario">
                Cliente
            </label>
            <!-- <datalist type="text" id="usuario" > -->
            <select name="usuario">
                <?php 
                    foreach($users as $c) { 
                        echo "<option value=$c[id]>$c[email]</option>"; 
                    }
                ?>
            </select>
            <br>
            <!-- </datalist> -->
            <label for="game">
                Adicionar jogo
            </label>
            <!-- <datalist type="text" id="games" > -->
            <select onchange="displayQtd(this.value)" name="game" id="game">
                <option value=0>Selecionar jogo</option>
                <?php 
                    foreach($itens as $c) { 
                        echo "<option class='game$c[id]' value='{ \"id\": \"".$c['id']."\", \"nome\": \"".$c['nome']." (".$c['nomeConsole'].")\", \"imagem\": \"".$c['imagem']."\", \"valor\": \"".$c['preco']."\" }'>$c[nome] ($c[nomeConsole])</option>"; 
                    } 
                ?>
            </select>
            <!-- </datalist> -->
            <br>

            <label for="qtd">
                Quantidade
            </label>
            <?php
                foreach($itens as $c) { 
                    echo "<select name=\"qtd\" id=\"selectQtd$c[id]\" style='display: none;'>";
                    for($i = 1; $i <= $c['quantidade']; $i++){
                        echo "<option value=$i>$i</option>";
                    }
                    echo "</select>";
                }
            ?>
            <br>

            <button class="buttonAddGame" style="margin-top: 3%;" type='button' onClick='addGame()'>adicionar Jogo</button>

            <div id='games' class="gamesCart">
                <!-- games -->
                <p id="msgSemProdutos">Sem produtos ainda...</p>
            </div>
            <p id="total">Total: R$ 0,00</p>
            
            <input class="buttonAddGame" type="submit" value="Comprar">
        </form>
        <script>
            let productsArr = [];
            let total = 0;

            function addGame() {
                if(document.getElementById("msgSemProdutos")){
                    document.getElementById("msgSemProdutos").remove();
                }

                let gameSelect = document.getElementById("game");
                var gameJson = JSON.parse(gameSelect.value);

                let qtd = document.getElementById("selectQtd"+gameJson.id);
                let divAtual = document.getElementById("games");
                
                total += qtd.value*gameJson.valor;
                document.getElementById("total").innerHTML = "Total: R$ "+total;
                gameJson.valorTotal = qtd.value*gameJson.valor;

                var game = `
                <div id="gameCard${gameJson.id}" class="gameCard">
                    <img  src="${gameJson.imagem}" class="gameCardImg" />
                    <p id="${"gameP"+gameJson.id}">
                        ${qtd.value+"x - "+gameJson.nome}
                    </p>
                    <p>
                        R$ ${qtd.value*gameJson.valor}
                    </p>
                    <div class="gameCardRemove" id="gameCardRemove${gameJson.id}" onclick="removeGame(${gameJson.id})">remover</div>
                    <input type="hidden" name="jogo${productsArr.length+1}" value="${gameJson.id}" />
                    <input type="hidden" name="qtd${productsArr.length+1}" value="${qtd.value}" />
                </div>
                `;

                gameSelect.remove(gameSelect.selectedIndex);
                divAtual.innerHTML += game;


                productsArr.push(gameJson);
            }

            function removeGame(game) {
                game = productsArr.find(item => item.id == game);
                console.log(game);
                document.getElementById("gameCard"+game.id).remove();
                
                var option = document.createElement('option');
                option.value = game;
                option.text = game.nome;

                let gameSelect = document.getElementById("game");
                gameSelect.add(option);                

                productsArr = productsArr.filter(item => item.id != game.id);

                total -= game.valorTotal;
                document.getElementById("total").innerHTML = "Total: R$ "+total;

                if(productsArr.length === 0) {
                    document.getElementById('games').innerHTML += "<p id=\"msgSemProdutos\">Sem produtos ainda...</p>";
                }
            }

            var lastSelected = 0;

            function displayQtd(gameJson){
                gameJson = JSON.parse(gameJson);
                console.log(gameJson);
                var select = document.getElementById('selectQtd'+gameJson.id);
                var otherSelect = document.getElementById('selectQtd'+lastSelected);
                select.style.display =  'flex';
                if(otherSelect){
                    otherSelect.style.display = 'none';
                }
                lastSelected = gameJson.id;
            }
        </script>
    </body>
</html>