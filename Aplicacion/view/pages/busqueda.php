<?php
include(__DIR__ . '/../../model/Funciones.php');
include(__DIR__ . '/../../model/Propiedad.php');

$id_ciudad = $_GET['ciudad'];
$id_tipo = $_GET['tipo'];
$estado = $_GET['estado'];
$result_propiedades = realizarBusqueda($id_ciudad, $id_tipo, $estado);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAWPI - Inmobiliaria</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="page-busqueda">
    <div class="container">
        <?php include("../partials/header.php"); ?>
        
        <h2 class="titulo-seccion">Resultados de la búsqueda</h2>
        <div class="contenedor-propiedades" id="contenedor-propiedades">
            <?php while ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                <div class="fila">
                    <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                        <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                        <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                            <div class="contenedor-img">
                                <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                <div class="estado">
                                    <?php echo $propiedad['estado'] ?>
                                </div>
                            </div>
                            <div class="info">
                                <h2><?php echo $propiedad['titulo'] ?></h2>
                                <p><?php echo $propiedad['ubicacion'] ?></p>
                                <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.')?></span>
                                <hr>
                                <table>
                                    <tr>
                                        <th>Ambientes</th>
                                        <th>Baños</th>
                                        <th>Dimensiones</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $propiedad['habitaciones'] ?></td>
                                        <td><?php echo $propiedad['banios'] ?></td>
                                        <td><?php echo $propiedad['dimensiones'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>

                    <?php if ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                        <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                            <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                            <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                                <div class="contenedor-img">
                                    <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                    <div class="estado">
                                        <?php echo $propiedad['estado'] ?>
                                    </div>
                                </div>
                                <div class="info">
                                    <h2><?php echo $propiedad['titulo'] ?></h2>
                                    <p><?php echo $propiedad['ubicacion'] ?></p>
                                    <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.')?></span>
                                    <hr>
                                    <table>
                                        <tr>
                                            <th>Ambientes</th>
                                            <th>Baños</th>
                                            <th>Dimensiones</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $propiedad['habitaciones'] ?></td>
                                            <td><?php echo $propiedad['banios'] ?></td>
                                            <td><?php echo $propiedad['dimensiones'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    <?php endif ?>

                    <?php if ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                        <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                            <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                            <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                                <div class="contenedor-img">
                                    <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                    <div class="estado">
                                        <?php echo $propiedad['estado'] ?>
                                    </div>
                                </div>
                                <div class="info">
                                    <h2><?php echo $propiedad['titulo'] ?></h2>
                                    <p><?php echo $propiedad['ubicacion'] ?></p>
                                    <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.') ?></span>
                                    <hr>
                                    <table>
                                        <tr>
                                            <th>Ambientes</th>
                                            <th>Baños</th>
                                            <th>Dimensiones</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $propiedad['habitaciones'] ?></td>
                                            <td><?php echo $propiedad['banios'] ?></td>
                                            <td><?php echo $propiedad['dimensiones'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    <?php endif ?>
                </div>
            <?php endwhile ?>
        </div>
    </div>

    <footer>
        <?php include("../partials/contenido-footer.php") ?>
    </footer>

    <script src="script.js"></script>
</body>

</html>
