<?php

function obtenerTodasLasPropiedades()
{
    include(__DIR__ . '/../config/conexion.php');
    $query = "SELECT * FROM propiedades ORDER BY fecha_alta DESC";
    $result = mysqli_query($conn, $query);
    return $result;
}

function obtenerPropiedadPorId($id_propiedad)
{
    include(__DIR__ . '/../config/conexion.php');
    $query = "SELECT * FROM propiedades WHERE id='$id_propiedad'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function cargarPropiedades($limInferior)
{
    include(__DIR__ . '/../config/conexion.php');
    $config = obtenerConfiguracion();
    if ($config['tipo_visualizacion_propiedades'] == "f") {
        $query = "SELECT * FROM propiedades ORDER BY fecha_alta DESC LIMIT $limInferior, 6";
    } else {
        $query = "SELECT * FROM propiedades WHERE 
                    id='$config[propiedad1]' OR 
                    id='$config[propiedad2]' OR 
                    id='$config[propiedad3]' OR 
                    id='$config[propiedad4]' OR 
                    id='$config[propiedad5]' OR 
                    id='$config[propiedad6]'
                UNION
                SELECT * FROM propiedades WHERE 
                    id!='$config[propiedad1]' AND 
                    id!='$config[propiedad2]' AND
                    id!='$config[propiedad3]' AND
                    id!='$config[propiedad4]' AND
                    id!='$config[propiedad5]' AND
                    id!='$config[propiedad6]' LIMIT $limInferior, 6";
    }
    $result = mysqli_query($conn, $query);
    return $result;
}

function realizarBusqueda($id_ciudad, $id_tipo, $estado)
{
    include(__DIR__ . '/../config/conexion.php');
    $query = "SELECT * FROM propiedades WHERE 1=1";

    if ($id_ciudad !== "") {
        $query .= " AND ciudad='$id_ciudad'";
    }
    if ($id_tipo !== "") {
        $query .= " AND tipo='$id_tipo'";
    }
    if ($estado !== "") {
        $query .= " AND estado='$estado'";
    }

    $result = mysqli_query($conn, $query);
    return $result;
}
?>
