<?php include("./includes/layouts/form/formHeader.php") ?>

<h1 class="font-bold text-xl">Logo Here</h1>
<p class="text-gray-400">Welcome Back</p>
<h1 class="font-bold text-3xl">Coloca tu codigo !</h1>

<form class="flex flex-col gap-4 " method="post">
    <div class="flex flex-col gap-1">
        <label for="nombre">Codigo</label>
        <input class="p-2 bg-[#D1E4CF] placeholder-black rounded-md outline-none" type="number" placeholder="Nombre">
    </div>
    <button class="bg-[#013B23] p-2 rounded-full font-medium text-lg  text-white">Iniciar Sesion</button>
</form>
<p class="text-gray-500"><a class="text-[#013B23]" href="/login.php">Volver</a></p>

<?php include("./includes/layouts/form/formFooter.php") ?>