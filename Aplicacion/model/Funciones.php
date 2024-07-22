
<?php
function obtenerConfiguracion()
{
    include("config/conexion.php");
    $query = "SELECT COUNT(*) AS total FROM configuracion";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] == '0') {
        $query = "INSERT INTO configuracion (id,user,password) VALUES (NULL, 'admin', 'admin')";
        if (mysqli_query($conn, $query)) {
            // Insert successful
        } else {
            echo "No se pudo insertar en la BD" . mysqli_error($conn);
        }
    }

    $query = "SELECT * FROM configuracion WHERE id='1'";
    $result = mysqli_query($conn, $query);
    $config = mysqli_fetch_assoc($result);
    return $config;
}

function obtenerTodasLasCiudades()
{
    include("config/conexion.php");
    $query = "SELECT * FROM ciudades";
    $result = mysqli_query($conn, $query);
    return $result;
}

function obtenerTodosLosTipos()
{
    include("config/conexion.php");
    $query = "SELECT * FROM tipos";
    $result = mysqli_query($conn, $query);
    return $result;
}

function cargarPropiedades($limInferior){
    include("config/conexion.php");
    $config = obtenerConfiguracion();
    if($config['tipo_visualizacion_propiedades']=="f"){
        $query = "SELECT * FROM propiedades ORDER BY fecha_alta DESC LIMIT $limInferior,6";
        $result = mysqli_query($conn, $query);
        return $result;
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
                id!='$config[propiedad6]' LIMIT $limInferior,6";
        $result = mysqli_query($conn, $query);
        return $result;
    }
}

function obtenerPropiedadPorId($id_propiedad)
{
    include("config/conexion.php");
    $query = "SELECT * FROM propiedades WHERE id='$id_propiedad'";
    $resultado_propiedad = mysqli_query($conn, $query);
    $propiedad = mysqli_fetch_assoc($resultado_propiedad);
    return $propiedad;
}

function obtenerCiudad($id_ciudad)
{
    include("config/conexion.php");
    $query = "SELECT * FROM ciudades WHERE id='$id_ciudad'";
    $resultado_ciudad = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado_ciudad);
    return $row['nombre_ciudad'];
}

function obtenerPais($id_pais)
{
    include("config/conexion.php");
    $query = "SELECT * FROM paises WHERE id='$id_pais'";
    $resultado_pais = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado_pais);
    return $row['nombre_pais'];
}

function obtenerFotosGaleria($id_propiedad)
{
    include("config/conexion.php");
    $query = "SELECT * FROM fotos WHERE id_propiedad='$id_propiedad'";
    $resultado_fotos = mysqli_query($conn, $query);
    return $resultado_fotos;
}

function obtenerTipo($id_tipo)
{
    include("config/conexion.php");
    $query = "SELECT * FROM tipos WHERE id='$id_tipo'";
    $resultado_tipo = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($resultado_tipo);
    return $row['nombre_tipo'];
}

function realizarBusqueda($id_ciudad, $id_tipo, $estado){
    include("config/conexion.php");
    if($id_ciudad !== "" && $id_tipo !== "" && $estado !== ""){
        $query = "SELECT * FROM propiedades WHERE ciudad='$id_ciudad' AND tipo='$id_tipo' AND estado='$estado'";
    } else if($id_ciudad !== "" && $id_tipo !== "" && $estado === ""){
        $query = "SELECT * FROM propiedades WHERE ciudad='$id_ciudad' AND tipo='$id_tipo'";
    } else if($id_tipo !== "" && $estado !== ""){
        $query = "SELECT * FROM propiedades WHERE tipo='$id_tipo' AND estado='$estado'";
    } else if($id_ciudad !== "" && $estado !== ""){
        $query = "SELECT * FROM propiedades WHERE ciudad='$id_ciudad' AND estado='$estado'";
    } else if($id_ciudad !== ""){
        $query = "SELECT * FROM propiedades WHERE ciudad='$id_ciudad'";
    } else if($id_tipo !== ""){
        $query = "SELECT * FROM propiedades WHERE tipo='$id_tipo'";
    } else if($estado !== ""){
        $query = "SELECT * FROM propiedades WHERE estado='$estado'";
    }

    $resultado_propiedades = mysqli_query($conn, $query);
    return $resultado_propiedades;
}
?>
