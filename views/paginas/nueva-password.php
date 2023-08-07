<?php include("./includes/layouts/form/formHeader.php") ?>

<h1 class="font-bold text-xl">Logo Here</h1>
<div>
<h1 class="font-bold text-3xl">Reestablecer Contraseña</h1>
<p class="text-gray-400">Coloca tu email para recuperar tu cuenta</p>
</div>

<form class="flex flex-col gap-4 " method="post">
    <div class="flex flex-col gap-1">
        <label for="nombre">Email</label>
        <input class="p-2 bg-[#D1E4CF] placeholder-black rounded-md outline-none" type="email" placeholder="Nombre">
    </div>
    <button class="bg-[#013B23] p-2 rounded-full font-medium text-lg  text-white">Continuar</button>
</form>
<p class="text-gray-500">No tienes una cuenta ? <a class="text-[#013B23]" href="/login.php">Volver</a> </p>

<?php include("./includes/layouts/form/formFooter.php") ?>