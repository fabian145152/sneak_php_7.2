<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zapatillas</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/arrow.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Quattrocento&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>GALERIA DE PRODUCTOS</h1>
        <hr>
    </header>
    <section id="main">

        <ul class="galery">
            <?php
            //compio la coneccion a la base de otra pagina y le corrijo los link
            include_once 'includes/db.php';
            $con = openCon('config/db_products.ini');
            $con->set_charset("utf8mb4");



            $sql = "SELECT * FROM `sneakers` WHERE 1";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <li>
                        <div class="box">
                            <figure>
                                <img src="<?php echo substr($row['images'], 3); ?> ">
                                <figcaption>
                                    <h3><?php echo $row['id_brand'] . ' ' .
                                            $row['model']  . '<br>' .
                                            $row['id_color'] . '<br>' .
                                            '$' . $row['price'] . '-' ?></h3>
                                </figcaption>
                            </figure>
                        </div>
                    </li>


            <?php

                    echo "<br>";
                }
            } else {
                die("Error: No hay datos en la tabla seleccionada");
            }

            mysqli_close($con);




            //include('vista_de_todo.php');


            ?>
        </ul>


    </section>
    <footer>
        <div id="acceso">
            <a href="form-login.php" target="_blank">Clientes</a>
        </div>
        <hr>
        <h3 id="footer-text">Copyrigth 2019</h3>

    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <div class="arrow">
        <a href="#" id="toTop">
            <img src="images/backToTop.png" alt="flecha">
            <img class="top" src="images/backToTop.png" alt="flecha">
        </a>
    </div>

    <script src="js/main.js"></script>
</body>

</html>