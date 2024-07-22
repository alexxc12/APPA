<?php
include("../model/Funciones.php");

class FuncionesController {
    
    public function obtenerConfiguracion() {
        return obtenerConfiguracion();
    }

    public function obtenerTodasLasCiudades() {
        return obtenerTodasLasCiudades();
    }

    public function obtenerTodosLosTipos() {
        return obtenerTodosLosTipos();
    }

    public function cargarPropiedades($limInferior) {
        return cargarPropiedades($limInferior);
    }

    public function obtenerPropiedadPorId($id_propiedad) {
        return obtenerPropiedadPorId($id_propiedad);
    }

    public function obtenerCiudad($id_ciudad) {
        return obtenerCiudad($id_ciudad);
    }

    public function obtenerPais($id_pais) {
        return obtenerPais($id_pais);
    }

    public function obtenerFotosGaleria($id_propiedad) {
        return obtenerFotosGaleria($id_propiedad);
    }

    public function obtenerTipo($id_tipo) {
        return obtenerTipo($id_tipo);
    }

    public function realizarBusqueda($id_ciudad, $id_tipo, $estado) {
        return realizarBusqueda($id_ciudad, $id_tipo, $estado);
    }
}
?>
