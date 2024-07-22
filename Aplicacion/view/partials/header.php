<?php
include(__DIR__ . '/../../model/Funciones.php');

$config = obtenerConfiguracion();
?>
<div class="contenedor-header">
    <header>
        <div class="logo">
            <a href="index.php">
                <h1><span style="font-size: 2em;">🏠</span></h1>
                <p>Inmobiliaria Web</p>
            </a>
        </div>

        <div class="nav-responsive" onclick="mostrarMenuResponsive()">
            ☰
        </div>
        <nav class="" id="nav">
            <a href="index.php">Inicio</a>
            <a href="propiedades.php">Propiedades</a>
            <a href="contacto.php">Contacto</a>
        </nav>

        <div class="info-contacto">
            <span class="info">
                <a href="tel:<?php echo $config['telefono1'] ?>">
                    📞
                    <span class="numero-telefono"><?php echo $config['telefono1'] ?> </span>
                </a>
            </span>
            <span class="info">
                <?php if ($config['facebook'] != null) : ?>
                    <a href="<?php echo $config['facebook'] ?>">📘</a>
                <?php endif ?>
            </span>
            <span class="info">
                <?php if ($config['twitter'] != null) : ?>
                    <a href="<?php echo $config['twitter'] ?>">🐦</a>
                <?php endif ?>
            </span>
        </div>
    </header>
</div>
