<?php  

class PerfilController{
    public static function index(Router $router)
    {

        $idusuario = $_SESSION['usuario']['id'];
        $ultimoForoSQL = "SELECT * FROM foros WHERE id_usuario = $idusuario order by fecha_creacion desc limit 1";
        $ultimoForoUnidoSQL = "SELECT * FROM usuariosforos inner join foros on usuariosforos.id_foro=foros.id  WHERE usuariosforos.id_usuario = $idusuario order by fecha_inscripcion DESC";
        
        $foros = Foros::where('id_usuario', $idusuario, 0);
        
        $ultimoForoExiste = Foros::executeSQL($ultimoForoSQL)->fetch_assoc();
        $ultimoForoUnido  = Foros::executeSQL($ultimoForoUnidoSQL)->fetch_all(MYSQLI_ASSOC);

        $cantidadForoUnidos = count($ultimoForoUnido);

        $ultimoForoUnido = $ultimoForoUnido[0] ?? '';

        if($ultimoForoExiste){
            $ultimoForoCreado = new Foros($ultimoForoExiste);
        }

        $blogs = Blog::where('id_usuario', $idusuario, 0);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $cambiosUsuario = new Usuarios($_SESSION['usuario']);


            foreach ($_POST as $key => $value) {
                $cambiosUsuario->setData($key, $value);
            }


            $cambiosUsuario->validarPerfil();

            if (!$cambiosUsuario->getErrors()) {
                $cambiosUsuario->actualizarPerfil();
            }
        }

        $router->setLayout('perfil');
        $router->render('perfil/perfil', [
            "active" => "perfil",
            "cambiosUsuario" => $cambiosUsuario ?? '',
            "foros" => $foros ?? '',
            "forosUnidos" => $cantidadForoUnidos ?? 0,
            "blogs" => $blogs ?? '',
            "ultimoForoCreado" => $ultimoForoCreado ?? '',
            "ultimoForoUnido" => $ultimoForoUnido ?? '',
        ]);
    }

    public static function reportes(Router $router){

        $reportes = ActiveRecord::executeSQL("SELECT reportescuentas.id_usuarioReportado, COUNT(*) AS cantidad_repeticiones, usuarios.*
        FROM ecomind.reportescuentas
        INNER JOIN usuarios ON id_usuarioReportado=usuarios.id
        GROUP BY id_usuarioReportado")->fetch_all(MYSQLI_ASSOC);

        $router->setLayout('perfil');
        $router->render("perfil/reportes", [
            "active" => "reportes",
            "reportes"=> $reportes
        ]);
    }

    public static function reportesMensaje(Router $router){

        $idUsuarioReportado = $_GET["id"];

        $mensajes = ActiveRecord::executeSQL("SELECT * FROM reportescuentas INNER JOIN forosmensaje ON id_mensaje = forosmensaje.id WHERE id_usuarioReportado = $idUsuarioReportado")->fetch_all(MYSQLI_ASSOC);

        $usuarioReportado = Usuarios::find($idUsuarioReportado);

        $router->setLayout("perfil");
        $router->render("perfil/reportesMensaje", [
            "usuarioReportado" => $usuarioReportado,
            "mensajes" => $mensajes
        ]);
    }
}