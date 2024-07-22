<?php
include(__DIR__ . '/../model/funciones.php');

class UsuarioController {
    public function login() {
        if (isset($_POST['iniciar'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $config = obtenerConfiguracion();

            if (($usuario == $config['user']) && ($password == $config['password'])) {
                $_SESSION['usuarioLogeado'] = "Administrador";
                header("Location: index.php");
            } else {
                $mensaje = "* El nombre de usuario o la contraseña son incorrectos";
                include(__DIR__ . '/../view/pages/login.php');
            }
        } else {
            include(__DIR__ . '/../view/pages/login.php');
        }
    }
}
?>
