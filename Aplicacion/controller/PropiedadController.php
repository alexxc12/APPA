<?php
include(__DIR__ . '/../model/funciones.php');

class PropiedadController {
    public function index() {
        $limInferior = 0;
        $config = obtenerConfiguracion();
        $result_ciudades = obtenerTodasLasCiudades();
        $result_tipos = obtenerTodosLosTipos();
        $result_propiedades = cargarPropiedades($limInferior);
        include(__DIR__ . '/../view/pages/index.php');
    }

    public function publicacion($id_propiedad) {
        $propiedad = obtenerPropiedadPorId($id_propiedad);
        $restul_fotos_galeria = obtenerFotosGaleria($id_propiedad);
        include(__DIR__ . '/../view/pages/publicacion.php');
    }

    public function busqueda($ciudad, $tipo, $estado) {
        $result_busqueda = realizarBusqueda($ciudad, $tipo, $estado);
        include(__DIR__ . '/../view/pages/busqueda.php');
    }
}
?>
