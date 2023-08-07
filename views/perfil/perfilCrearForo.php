<section>
    
    <form enctype="multipart/form-data" action="" method="post" novalidate class="flex flex-col p-4 rounded-xl mt-4 gap-8 bg-[#f0f0f0e4]">
        <div class="flex flex-col gap-4 max-w-lg">
            <h2 class="titulo !font-bold">Crear Foro</h2>
            <?= mostrarError($foro ?? null) ?>
        </div>
        <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
        <label class="font-semibold" for="nombre">Nombre</label>
            <input  name="nombre" required class="p-2 rounded-lg outline-none focus:border-green-500 valid:border-green-500 border border-black border-opacity-20" value="<?=getValue('nombre')?>" type="text">
        </div>

        <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
            <label class="font-semibold" for="descripcion">Descripcion</label>
            <textarea name="descripcion" required class="p-4  rounded-lg outline-none focus:border-green-500 valid:border-green-500 border border-black border-opacity-20 resize-none" id="descripcion"><?=getValue('descripcion')?></textarea>    
        </div>
        
        <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
            <label class="font-semibold" for="descripcion">Imagen</label>
            <input accept="image/*" name="imagen_url" type="file" class="file:bg-white file:cursor-pointer file:border-none">
        </div>

        <button class="bg-green-800 hover:bg-opacity-80 transition-all hover:shadow-xl w-fit px-6 text-white rounded-full p-2 font-bold">Agregar Foro</button>
    </form>
</section>