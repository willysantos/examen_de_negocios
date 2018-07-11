<?php
require 'Conexion.php';
if (!isset($_GET['name'])){
    header("Location:info.php");
    exit;
}
$nombre_city=$_GET['name'];
$info_city = $pdo->query("Select city.Name from city inner join  country on city.CountryCode"
. "  = country.Code Where country.Name = '{$nombre_city}'"
. " order by city.Name asc"
. " limit 3");
$info_idioma = $pdo->query("Select countrylanguage.Language from countrylanguage"
. " inner join country on countrylanguage.CountryCode = country.Code"
. " Where country.Name = 'Afghanistan'"
. " order by countrylanguage.Percentage desc"
. " limit 2");

?>
<html>
<head>
    <title>Info de pais</title>
    <style rel="stylesheet">

        #contenedor{
            padding: 0%;
            margin: auto;
            display: flex;
            justify-content: space-around;
            height: 40%;
            width: 40%;

        }
        .caja{
            width: 175px;
            height: 175px;
            align-self: center;
        }
        .caja{
            background-color: darkorange ;
        }
        .caja h1{
            color: aliceblue;
            text-align: center;

        }



    </style>
</head>
<body>
<a href="index.php">Volver a la tabla de paises</a>
<h1>Las 3 primeras ciudades de <?php echo $nombre_city?> son :</h1>
<div id="contenedor">

    <?php foreach ($info_city as $city):?>
    <div class="caja">
        <h1><?php echo $city['Name']?></h1>
    </div>
    <?php endforeach;?>
</div>
<h1>Las 2 idiomas mas hablados de  <?php echo $nombre_city?> son :</h1>
<div id="contenedor">
    <?php foreach ($info_idioma as $lenguaje):?>
        <div class="caja">
            <h1><?php echo $lenguaje['Language']?></h1>
        </div>
    <?php endforeach;?>
</div>
</body>
</html>
