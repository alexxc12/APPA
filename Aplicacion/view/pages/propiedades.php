<?php
include(__DIR__ . '/../../model/Funciones.php');
include(__DIR__ . '/../../model/Propiedad.php');

$config = obtenerConfiguracion();
$result_ciudades = obtenerTodasLasCiudades();
$result_tipos = obtenerTodosLosTipos();
$result_propiedades = cargarPropiedades(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAWPI - Inmobiliaria</title>
    <link rel="stylesheet" href="estilo.css">
    <script>
        function cargarMasPropiedades(str) {
            var conexion;
            if (str == "") {
                document.getElementById("contenedor-propiedades").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                conexion = new XMLHttpRequest();
            }
            conexion.onreadystatechange = function() {
                if (conexion.readyState == 4 && conexion.status == 200) {
                    document.getElementById("contenedor-propiedades").innerHTML += conexion.responseText;
                    document.getElementById("botonCargarMas").value = parseInt(document.getElementById("botonCargarMas").value) + 6;
                }
            }
            conexion.open("GET", "maspropiedades.php?c=" + str, true);
            conexion.send();
        }
    </script>
</head>

<body class="page-propiedades">
    <div class="container">
        <?php include("../partials/header.php"); ?>

        <div class="box-buscar-propiedades pos-centrada">
            <div class="box-interior">
                <p>Encuentra la propiedad que busca</p>
                <form action="busqueda.php?" method="get">
                    <select name="ciudad" id="">
                        <option value="">Seleccione Ciudad</option>
                        <?php while ($row = mysqli_fetch_assoc($result_ciudades)) : ?>
                            <option value="<?php echo $row['id'] ?>">
                                <?php echo $row['nombre_ciudad'] ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <select name="tipo" id="">
                        <option value="">Tipo de Propiedad</option>
                        <?php while ($row = mysqli_fetch_assoc($result_tipos)) : ?>
                            <option value="<?php echo $row['id'] ?>">
                                <?php echo $row['nombre_tipo'] ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                    <div class="estado">
                        <span>
                            <input type="radio" value="alquiler" name="estado" checked> Alquiler
                        </span>
                        <span>
                            <input type="radio" value="venta" name="estado"> Venta
                        </span>
                    </div>
                    <input type="submit" value="Buscar" name="buscar">
                </form>
            </div>
        </div>
        
        <h2 class="titulo-seccion">Propiedades Disponibles</h2>
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

        <button value="0" onclick="cargarMasPropiedades(this.value)" id="botonCargarMas"> Ver Más</button>
    </div>

    <footer>
        <?php include("../partials/contenido-footer.php") ?>
    </footer>

    <script src="script.js"></script>
</body>

</html>
