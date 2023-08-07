<?php

class IndexController
{
    public static function index(Router $router): void
    {
        $router->render('paginas/principal', [
            "usuario" => $_SESSION['usuario'] ?? '',
            "navMobile" => navUserButton("usuario-opciones-mobile", "usuario-menu-mobile"),
            "navDesktop" => navUserButton("usuario-opciones", "usuario-menu"),
        ]);
    }

    public static function registro(Router $router){

        $registroExitoso = false;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario['nombre']   = sanitizar($_POST['nombre']) ?? '';
            $usuario['usuario']  = sanitizar($_POST['usuario']) ?? '';
            $usuario['email']   = strtolower(sanitizar($_POST['email'])) ?? '';
            $usuario['password'] = sanitizar($_POST['password']) ?? '';

            $newUsuario = new Usuarios($usuario);
                
            $newUsuario->validar();

            if(empty($newUsuario::getErrors())){
                $registroExitoso = $newUsuario->crearCuenta();
            }

        }

        $router->setLayout('form');
        $router->render("paginas/registro",[
            "registroExitoso" => $registroExitoso,
            "newUsuario" => $newUsuario ?? ''
        ]);
    }

    public static function login(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario['email']    = strtolower(sanitizar($_POST['email'] ?? ''));
            $usuario['password'] = sanitizar($_POST['password'] ?? '');

            $usuarioLogin = new Usuarios($usuario);

            $usuarioLogin->validarLogin();

            if (!$usuarioLogin->getErrors()) {
                $usuarioLogin->login();
            }
        }

        $router->setLayout('form');
        $router->render("paginas/login", [
            "titulo" => "Login",
            "usuarioLogin" => $usuarioLogin ?? ''
        ]);
    }
    public static function logout()
    {
        session_start();
        session_destroy();
        header("location: /");
    }

    public static function sobreNosotros(Router $router){
        $router->setLayout('inicio');
        $router->render("paginas/sobre-nosotros");
    }

}
