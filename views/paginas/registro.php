
<?php

// $errores = [];
// $registroExitoso = false;



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     $usuario['nombre']   = sanitizar($_POST['nombre']) ?? '';
//     $usuario['usuario']  = sanitizar($_POST['usuario']) ?? '';
//     $usuario['email']   = strtolower(sanitizar($_POST['email'])) ?? '';
//     $usuario['password'] = sanitizar($_POST['password']) ?? '';

//     $newUsuario = new Usuarios($usuario);
        
//     $newUsuario->validar();

//     if(empty($newUsuario::getErrors())){
//         $registroExitoso = $newUsuario->crearCuenta();
//     }

// }

?>


<h1 class="font-bold text-xl">Logo Here</h1>
<p class="text-gray-400">Welcome Back</p>
<h1 class="font-bold text-3xl">Registro</h1>

<?= mostrarError($newUsuario ?? '') ?>

<?php if (!$registroExitoso) : ?>
    <form novalidate class="flex flex-col gap-4 " method="post">
        <div class="flex flex-col gap-1">
            <label for="nombre">Nombre</label>
            <input class="p-2 bg-[#D1E4CF] rounded-md outline-none" value="<?= getValue('nombre') ?>" name="nombre" type="text" placeholder="Nombre">
        </div>
        <div class="flex flex-col gap-1">
            <label for="nombre">Nombre de usuario</label>
            <input class="p-2 bg-[#D1E4CF] rounded-md outline-none" value="<?= getValue('usuario') ?>" name="usuario" type="text" placeholder="Nombre de usuario">
        </div>
        <div class="flex flex-col gap-1">
            <label for="nombre">Email</label>
            <input class="p-2 bg-[#D1E4CF] rounded-md outline-none" value="<?= getValue('email') ?>" name="email" type="email" placeholder="Nombre">
        </div>
        <div class="flex flex-col gap-1">
            <label for="nombre">Contraseña</label>
            <input class="p-2 bg-[#D1E4CF] rounded-md outline-none" value="<?= getValue('password') ?>" name="password" type="password" placeholder="Nombre">
        </div>

        <button type="submit" class="bg-[#013B23] p-2 rounded-full font-medium text-lg  text-white">Crea tu cuenta </button>
    </form>
    <p class="text-gray-500">Ya tienes cuenta ?<a class="text-[#013B23]" href="/login">Inicia sesion!</a> </p>
<?php else: ?>
    <h2>Registro exitoso !</h2>
    <a href="/login">Login</a>
<?php endif ?>
