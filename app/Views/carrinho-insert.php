<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <select name="usuario" >
        <?php 
            foreach ($users as $element) {
                echo "<option value='$element[id]'>$element[email]</option>";
            }
        ?>
    </select>

    <input type="submit" value="Manda">

</form>

</body>
</html>