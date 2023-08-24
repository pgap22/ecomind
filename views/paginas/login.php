<h1 class="font-bold text-xl">Logo Here</h1>
<p class="text-gray-400">Welcome Back</p>
<h1 class="font-bold text-3xl">Login</h1>

<?= mostrarError($usuarioLogin ?? '') ?>

<form novalidate class="flex flex-col gap-4 " method="post">

    <div class="flex flex-col gap-1">
        <label for="nombre">Email</label>
        <input class="p-2 bg-[#D1E4CF]  rounded-md outline-none" name="email" value="<?=getValue("email")?>" type="email" placeholder="Nombre">
    </div>

    <div class="flex flex-col gap-1">
        <div class="flex justify-between">
            <label for="nombre">Contraseña</label>
            <!-- <a class="text-gray-500" href="/olvidar-password">Olvidaste tu contraseña ?</a> -->
        </div>
        <input class="p-2 bg-[#D1E4CF]  rounded-md outline-none" name="password" value="<?=getValue("password")?>" type="password" placeholder="Nombre">
    </div>

    <button class="bg-[#013B23] p-2 rounded-full font-medium text-lg  text-white">Iniciar Sesion</button>
</form>
<p class="text-gray-500">No tienes una cuenta ? <a class="text-[#013B23]" href="/registro">Registrate !</a> </p>