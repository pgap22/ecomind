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

    public static function registro(Router $router)
    {

        $registroExitoso = false;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario['nombre']   = sanitizar($_POST['nombre']) ?? '';
            $usuario['usuario']  = sanitizar($_POST['usuario']) ?? '';
            $usuario['email']   = strtolower(sanitizar($_POST['email'])) ?? '';
            $usuario['password'] = sanitizar($_POST['password']) ?? '';

            $newUsuario = new Usuarios($usuario);

            $newUsuario->validar();

            if (empty($newUsuario::getErrors())) {
                $registroExitoso = $newUsuario->crearCuenta();
            }
        }

        $router->setLayout('form');
        $router->render("paginas/registro", [
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

    public static function sobreNosotros(Router $router)
    {
        $router->setLayout('inicio');
        $router->render("paginas/sobre-nosotros");
    }

    public static function reportar(Router $router)
    {
        $foro_id = $_GET['id_foro'];
        $id = $_POST['id'];
        $idComentario = $_POST['id_comentario'];
        $motivo = $_POST['motivo'];

        $idUsuario = $_SESSION['usuario']['id'];

        ActiveRecord::executeSQL("INSERT INTO reportescuentas (id_usuario, id_usuarioReportado, motivo, id_mensaje)
        SELECT $idUsuario, $id, '$motivo', $idComentario
        WHERE $idUsuario NOT IN (SELECT id_usuario FROM reportescuentas WHERE id_mensaje = $idComentario AND motivo = '$motivo') OR '$motivo' NOT IN (SELECT motivo FROM reportescuentas WHERE id_usuario = $idUsuario AND id_usuarioReportado = $id);
        ");

        header("location: /misforos/foro?id=$foro_id&?mensajeReportado=1");
    }

    public static function banear(Router $router)
    {
        $idUsuarioReportado = $_POST['id'];
        $rolUsuario = $_SESSION['usuario']['rol'];

        if ($rolUsuario !== 'admin') {
            header("location: /");
            return;
        }

        $usuarioReportado = Usuarios::find($idUsuarioReportado);
        $mensaje = "";

        $idusuario = $usuarioReportado->id;

        if ($usuarioReportado->estado == "ban") {
            $usuarioReportado->setData("estado", "normal");
            $mensaje = "El usuario ha sido desbaneado";
            ActiveRecord::executeSQL("UPDATE forosmensaje set oculto=0 where id_usuario = $idusuario");

        } else {
            $usuarioReportado->setData("estado", "ban");
            $mensaje = "El usuario ha sido baneado";
            ActiveRecord::executeSQL("UPDATE forosmensaje set oculto=1 where id_usuario = $idusuario");
        }


        //Foros, Blogs y Comentarios
        ActiveRecord::executeSQL("DELETE FROM foros where id_usuario = $idusuario");
        ActiveRecord::executeSQL("DELETE FROM blog where id_usuario = $idusuario");
        ActiveRecord::executeSQL("DELETE FROM usuariosforos where id_usuario = $idusuario");

        $usuarioReportado->save();
        $_SESSION["mensaje"] = $mensaje;

        header("location: /perfil/reportes");
    }
}
