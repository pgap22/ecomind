<?php include("./../includes/app.php")  ?>

<?php 

$router = new Router;

$router->get("/", [IndexController::class, 'index']);
$router->get("/sobre-nosotros", [IndexController::class, 'sobreNosotros']);


$router->get("/logout", [IndexController::class, 'logout']);

$router->get("/login", [IndexController::class, 'login']);
$router->post("/login", [IndexController::class, 'login']);
$router->get("/registro", [IndexController::class, 'registro']);
$router->post("/registro", [IndexController::class, 'registro']);


$router->get("/perfil", [PerfilController::class, 'index']);
$router->post("/perfil", [PerfilController::class, 'index']);

    
$router->get("/foros", [ForoController::class, 'index']);
$router->post("/foros", [ForoController::class, 'index']);

$router->get("/misforos", [ForoController::class, 'forosUnidos']);
$router->post("/misforos", [ForoController::class, 'forosUnidos']);

$router->get("/misforos/foro", [ForoController::class, 'infoForo']);

$router->get("/perfil/foro", [ForoController::class, 'foros']);
$router->post("/perfil/foro", [ForoController::class, 'foros']);

$router->get("/perfil/foro/crear", [ForoController::class, 'crear']);
$router->post("/perfil/foro/crear", [ForoController::class, 'crear']);

$router->get("/perfil/foro/editar", [ForoController::class, 'editar']);
$router->post("/perfil/foro/editar", [ForoController::class, 'editar']);


$router->get("/perfil/blog", [BlogController::class, 'blogs']);
$router->post("/perfil/blog", [BlogController::class, 'blogs']);

$router->get("/perfil/blog/crear", [BlogController::class, 'crear']);
$router->post("/perfil/blog/crear", [BlogController::class, 'crear']);

$router->get("/perfil/blog/editar", [BlogController::class, 'editar']);
$router->post("/perfil/blog/editar", [BlogController::class, 'editar']);



$router->ejecutarRutas();

?>