<?php  

class BlogController{
    public static function blogs(Router $router){
        $blogs = Blog::where("id_usuario", $_SESSION['usuario']['id'], 0);
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $blog = Blog::find($_POST['id'] ?? null);
            if ($blog) {
                $blog->delete();
                header("location: /perfil/blog");
            }
        }

        $router->setLayout('perfil');
        $router->render('perfil/blog', [
            "active" => "blogCreados",
            "blogs" => $blogs,
        ]);
    }
    public static function crear(Router $router)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $blog = new Blog([
                ...$_POST,
                "id_usuario" => $_SESSION['usuario']['id']
            ]);
   
            $blog->validar();
            
            if(empty($blog->getErrors())){

                $blog->actualizarImagen();

                $blog->save();

                $_SESSION['alerta'] = true;

                header("location: /perfil/blog");
            }
        }

        $router->setLayout('perfil');
        $router->render('perfil/blogForm',[
            "active" => "crearBlog",
            "blog" => $blog ?? ''
        ]);
    }
    public static function editar(Router $router){
        $id = $_GET['id'];
        $usuarioID = $_SESSION['usuario']['id'];

        $blog  = Blog::executeSQL("SELECT * from blog WHERE id_usuario = $usuarioID AND id = $id");
        $blog  = new Blog($blog->fetch_assoc());

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            foreach ($_POST as $key => $value) {
                $blog->setData($key, $value);
            }

            $blog->validar(false);

            if (empty($blog->getErrors())) {

                if (!empty($_FILES['imagen_url']['name'])) {
                    $blog->actualizarImagen();
                }


                $blog->save();

     

                $_SESSION['editado'] = true;


                header("location: /perfil/blog");
            }
        }


        $router->setLayout('perfil');
        $router->render('perfil/blogForm',[
            "blog" => $blog,
            "editar" => true,
        ]);
    }

    public static function todosBlogs(Router $router){

        $blogs = Blog::all();

        $router->setLayout("inicio");
        $router->render("blog/blog", [
            "blogs" => $blogs ?? ''
        ]);
    }

    public static function infoBlog(Router $router){
        $id_blog = $_GET['id'] ?? '';
        
        $blog = Blog::find($id_blog);
        $usuarioBlog = Usuarios::find($blog->id_usuario);
        $blogsRecomendados = Blog::blogRecomendados($id_blog);


        $router->setLayout("inicio");
        $router->render("blog/info", [
            "blog" => $blog ?? '',
            "usuarioBlog" => $usuarioBlog ?? '',
            "blogsRecomendados" => $blogsRecomendados ?? '',
        ]);
    }

}