<?php
function navUserButton($opcionesid, $menuid)
{
    $usuario = $_SESSION['usuario'] ?? '';

    $usuarioImagen = $usuario['imagen_url'] ?? '';
    $usuarioNombre = $usuario['nombre'] ?? '';

    return (isset($usuario['id']))  ?  "<div id=$opcionesid class='grid grid-cols-2 relative cursor-pointer select-none gap-2 items-center text-white bg-[#013b23e6] w-[220px] p-2 rounded-full'>
         <div class='flex items-center gap-2'>
             <img width='40' class=' aspect-square rounded-full' src='$usuarioImagen' alt=''>
             <p class='font-bold'>$usuarioNombre</p>
         </div>
         <img class='mr-2 justify-self-end' src='/imagenes/more.svg' alt=''>
     
         <div id=$menuid class='absolute z-20 hidden drop-menu rounded-[30px] -bottom-[390px] p-4  flex-col left-0 right-0 text-white'>
             <a href='/perfil' class='drop-link'>
                 <img src='/imagenes/usuario.svg' alt=''>
                 <p>Ver perfil</p>
             </a>
             <a href='/misforos' class='drop-link'>
                 <img src='/imagenes/forosUnidos.svg' alt=''>
                 <p>Foros unidos</p>
             </a>
             <a href='/perfil/foro/crear' class='drop-link'>
                 <img src='/imagenes/forosCrear.svg' alt=''>
                 <p>Crear foro</p>
             </a>
             <a href='/perfil/foro' class='drop-link'>
                 <img src='/imagenes/forosEditar.svg' alt=''>
                 <p>Editar foro</p>
             </a>
             <a href='/perfil/blog/crear' class='drop-link'>
                 <img src='/imagenes/blogsCrear.svg' alt=''>
                 <p>Crear Blog</p>
             </a>
             <a href='/perfil/blog' class='drop-link'>
                 <img src='/imagenes/blogsCreados.svg' alt=''>
                 <p>Blog Creados</p>
             </a>
             <a href='/logout' class='drop-link'>
                 <img src='/imagenes/logout.svg' alt=''>
                 <p>Cerrar sesion</p>
             </a>
         </div>
     </div>
     " : "<a href='/login' class='p-4 bg-[#013B23] text-white font-bold rounded-full'>Iniciar Sesion</a>";
}

function headers()
{
    return "
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap' rel='stylesheet'>";
}

function mostrarError($obj)
{
    if ($obj == null) return '';

    $errores = $obj->getErrors();

    if (!empty($errores)) {
        $error = $errores[0];
        $message = $error['error'];

        return "<div onclick='this.style.display = `none`' class='bg-[#013B23] cursor-pointer p-2 font-bold text-white rounded-md shadow-lg'>
        <p>ERROR: $message </p>
        </div>";
    }

    return '';
}

function sanitizar(string $string)
{
    return htmlentities(addslashes($string));
}

function getValue($field)
{
    return $_POST[$field] ?? '';
}

function activeLink($link, $active)
{
    return $active == $link ? 'rounded-lg bg-[#DDE3E0]' : '';
}
