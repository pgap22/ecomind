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

$router->post("/reportar", [IndexController::class, 'reportar'], true);
$router->post("/banear", [IndexController::class, 'banear'], true);


$router->get("/perfil", [PerfilController::class, 'index'], true);
$router->post("/perfil", [PerfilController::class, 'index'], true);

$router->get("/perfil/reportes", [PerfilController::class, 'reportes'], true);
$router->get("/perfil/reportes/mensajes", [PerfilController::class, 'reportesMensaje'], true);


$router->get("/foros", [ForoController::class, 'index']);
$router->post("/foros", [ForoController::class, 'index']);

$router->get("/misforos", [ForoController::class, 'forosUnidos'], true);
$router->post("/misforos", [ForoController::class, 'forosUnidos'], true);

$router->get("/misforos/foro", [ForoController::class, 'infoForo'], true);
$router->post("/misforos/foro", [ForoController::class, 'infoForo'], true);


$router->post("/foro/mensaje", [ForoController::class, 'enviarComentario'], true);

$router->get("/perfil/foro", [ForoController::class, 'foros']);
$router->post("/perfil/foro", [ForoController::class, 'foros']);

$router->get("/perfil/foro/crear", [ForoController::class, 'crear'], true);
$router->post("/perfil/foro/crear", [ForoController::class, 'crear'], true);

$router->get("/perfil/foro/editar", [ForoController::class, 'editar'], true);
$router->post("/perfil/foro/editar", [ForoController::class, 'editar'], true);


$router->get("/perfil/blog", [BlogController::class, 'blogs'], true);
$router->post("/perfil/blog", [BlogController::class, 'blogs'], true);

$router->get("/perfil/blog/crear", [BlogController::class, 'crear'], true);
$router->post("/perfil/blog/crear", [BlogController::class, 'crear'], true);

$router->get("/perfil/blog/editar", [BlogController::class, 'editar'], true);
$router->post("/perfil/blog/editar", [BlogController::class, 'editar'], true);

$router->get("/blogs", [BlogController::class, 'todosBlogs']);
$router->get("/blogs/informacion", [BlogController::class, 'infoBlog']);

$router->ejecutarRutas();

?>