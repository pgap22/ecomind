<?php

class ForoController
{
    public static function index(Router $router){

        if(isset($_GET['busqueda'])){
            $query = $_GET['busqueda'];
            $foros = Foros::busqueda($query);
        }else{
            $foros = Foros::all();
        }


        if($_SERVER['REQUEST_METHOD'] == "POST"){

            if(!isset($_SESSION['usuario']['id'])){
                header("location: /login");
                return;
            }

            $foro = Foros::find($_POST['id']);

            $foro->unirseForo();

            header("location: /misforos/foro?id=".$foro->id);
        }
  
        $router->setLayout('inicio');
        $router->render('paginas/foros',[
            "foros" => $foros
        ]);
    }
    public static function crear(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $id_usuario = $_SESSION['usuario']['id'];

            $foro = new Foros([...$_POST, "id_usuario" => $id_usuario]);

            $foro->validar();

            if (!$foro->getErrors()) {

                $foroimgname = time() . $_FILES['imagen_url']['name'];
                $path = "/foroimg/" . $foroimgname;
                move_uploaded_file($_FILES['imagen_url']['tmp_name'], "." . $path);

                $foro->setData('imagen_url', $path);

                $foro->save();

                $_SESSION['alerta'] = true;

                header("location: /perfil/foro");
            }
        }

        $router->setLayout('perfil');

        $router->render('perfil/perfilCrearForo', [
            "active" => "crearForo",
            "foro" => $foro ?? ''
        ]);
    }
    public static function foros(Router $router)
    {
        $foros = Foros::where("id_usuario", $_SESSION['usuario']['id'], 0);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $foro = Foros::find($_POST['id'] ?? null);
            if ($foro) {
                $foro->delete();
                header("location: /perfil/foro");
            }
        }

        $router->setLayout('perfil');
        $router->render('perfil/perfilForos', [
            "active" => 'foroCreados',
            "foros" => $foros,
        ]);
    }
    public static function editar(Router $router)
    {
        $id = $_GET['id'];
        $usuarioID = $_SESSION['usuario']['id'];

        $foro  = Foros::executeSQL("SELECT * from foros WHERE id_usuario = $usuarioID AND id = $id");
        $foro  = new Foros($foro->fetch_assoc());
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            foreach ($_POST as $key => $value) {
                $foro->setData($key, $value);
            }

            $foro->validar(false);

            if (!$foro->getErrors()) {

                if (!empty($_FILES['imagen_url']['name'])) {
                    $foro->actualizarImagen();
                }

                $foro->save();

                $_SESSION['editado'] = true;


                header("location: /perfil/foro");
            }
        }

        $router->setLayout('perfil');
        $router->render("perfil/perfilEditarForo",[
            "foro" => $foro,
        ]);
    }

    public static function infoForo(Router $router){
        $idForo = $_GET['id'];
        $idUsuario = $_SESSION['usuario']['id'];

        $foro = Foros::find($idForo);

        $estaDentro = Foros::executeSQL("SELECT * FROM usuariosForos WHERE id_foro = $idForo AND id_usuario = $idUsuario")->fetch_assoc();
        
        if(!$estaDentro){
            header("location: /foros");
        }

        $router->setLayout('inicio');
        $router->render('foro/foro', [
            "foro" => $foro
        ]);
    }

    public static function forosUnidos(Router $router){
        if(isset($_GET['busqueda'])){
            $query = $_GET['busqueda'];
            $foros = Foros::busquedaForosUnidos($query);
        }else{
            $foros = Foros::obtenerForosUnidos();
        }


        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $foro = Foros::find($_POST['id']);

            $foro->unirseForo();

            header("location: /misforos/foro?id=".$foro->id);
        }
  
        $router->setLayout('inicio');
        $router->render('paginas/foros',[
            "foros" => $foros,
            "foroUnido" => true,
        ]);
    }
}
