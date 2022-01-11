<?php

$sql = "SELECT s.model as model, 
                           s.price as price, 
                           s.images as image, 
                           s.observacion, 
                           c.description as color, 
                           b.description as brand, 
                           s.free_sheeping as envio,
                           date_format (s.fecha_alta, '%d-%m-%Y') as fecha_alta 
            FROM sneakers s 
            INNER JOIN brand b ON s.id_brand =b.id_brand 
            INNER JOIN color c ON s.id_color=c.id_color 
            ORDER BY s.fecha_alta";



while ($row = $result->fetch_assoc()) {
?>
    <li>
        <div class="box">
            <figure>
                <img src="<?php echo substr($row['image'], 3) ?>">
                <figcaption>
                    <h3><?php echo $row['brand'] . ' ' . $row['model']  . '<br>' . $row['color'] ?></h3>

                    <h3><?php if ($row['Envio Gratis'] = 'envio') {
                            echo $row['envio'];
                        } ?></h3>


                </figcaption>
                <p><?php echo "$" . $row['price'] . '-' ?> </p>
                <time><?php echo $row['fecha_alta'] ?></time>

                <!-- con el substr (     ,3)  le saco ..// de adelante de la ruta cuando cargo la imagen  -->
            </figure>
        </div>
    </li>
<?php
}
