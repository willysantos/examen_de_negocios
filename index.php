<?php
require 'Conexion.php';
$resultado = $pdo->query("select Code,Name, Continent, Population, LifeExpectancy, HeadOfState from country",
    PDO::FETCH_ASSOC);
//var_dump($resultado);

?>
<html>
<head>
    <title>Examen</title>
    <style rel="stylesheet">
        #tbl-paises{
            border-collapse: collapse;
            width: 100%;
            /*background-color: blue;*/
        }
        #tbl-paises tr th{
            background-color: darkorange;
            color: aliceblue;
        }
        #tbl-paises th{
            background-color: #a6e4ff;
            font-size: 20px;
            padding: 5px;
        }
        #tbl-paises td{
            padding: 5px;
            font-size: 18px;
        }
        #tbl-paises tr:hover{
            background-color: beige;
        }
        #tbl-paises a:hover{
            color: aqua;
        }
    </style>
</head>
<body>
<table id="tbl-paises" border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Continet</th>
        <th>Population</th>
        <th>Life Expectansy</th>
        <th>HeadOfState</th>
        <th>Info del Pais</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($resultado as $pais): ?>
        <tr>
            <td><?php echo $pais['Name'] ?></td>
<!--            <td><a href="info.php?name=--><?php //echo $pais['Name']?><!--">--><?php //echo $pais['Name'] ?><!--</a></td>-->
            <td><?php echo $pais['Continent'] ?></td>
            <td><?php echo $pais['Population'] ?></td>
            <td><?php echo $pais['LifeExpectancy'] ?></td>
            <td><?php echo $pais['HeadOfState'] ?></td>
            <td><a href="info.php?name=<?php echo $pais['Name']?>">Info de <?php echo $pais['Name'] ?></a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
