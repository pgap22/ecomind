<?php  

class PerfilController{
    public static function index(Router $router)
    {

        $idusuario = $_SESSION['usuario']['id'];
        $ultimoForoSQL = "SELECT * FROM foros WHERE id_usuario = $idusuario order by fecha_creacion desc limit 1";


        $foros = Foros::where('id_usuario', $idusuario, 0);
        
        $ultimoForoExiste = Foros::executeSQL($ultimoForoSQL)->fetch_assoc();
        
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
            "blogs" => $blogs ?? '',
            "ultimoForoCreado" => $ultimoForoCreado ?? ''
        ]);
    }
}