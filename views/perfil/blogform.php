<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script type="module" src="/js/editor.js"></script>
<script type="module" defer src="/js/blog.js"></script>

<section>
    <form id="form" enctype="multipart/form-data" method="post" novalidate class="flex flex-col p-4 rounded-xl mt-4 gap-8 bg-[#f0f0f0e4]">
        <div class="flex flex-col gap-4 max-w-lg">
            <h2 class="titulo !font-bold"><?= isset($editar) ? 'Editar Blog' : 'Crear Blog' ?></h2>
            <?= mostrarError($blog)  ?>
        </div>
        <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
            <label class="font-semibold" for="nombre">Titulo</label>
            <input name="titulo" required class="p-2 rounded-lg outline-none focus:border-green-500 valid:border-green-500 border border-black border-opacity-20" value="<?= isset($editar) ? $blog->titulo : getValue('titulo') ?>" type="text">
        </div>

        <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
            <label class="font-semibold" for="nombre">Subtitulo</label>
            <input name="subtitulo" required class="p-2 rounded-lg outline-none focus:border-green-500 valid:border-green-500 border border-black border-opacity-20" value="<?= isset($editar) ? $blog->subtitulo :  getValue('subtitulo') ?>" type="text">
        </div>


        <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
            <label class="font-semibold" for="descripcion"><?= isset($editar) ? 'Editar Foto' : 'Imagen Portada' ?></label>
            <input accept="image/*" name="imagen_url" type="file" class="file:bg-white file:cursor-pointer file:border-none">
        </div>


        <?php if (isset($editar)) : ?>
            <div class="flex flex-col sm:grid grid-cols-[0.25fr_minmax(0,1fr)] sm:items-center max-w-lg gap-4">
                <label class="font-semibold" for="descripcion">Imagen actual</label>
                <img width="220" class="rounded-lg" src="<?= $blog->imagen_url ?>" alt="">
            </div>

        <?php endif ?>


        <div class="flex flex-col max-w-lg gap-4">
            <label class="font-semibold" for="descripcion">Contenido</label>
            <div class="bg-white p-2 rounded-lg" id="editorjs"></div>
            <input type="text" name="contenido" hidden id="contenido" value=<?= isset($editar) ? $blog->contenido : getValue('contenido') ?>>
        </div>

        <button class="bg-green-800 hover:bg-opacity-80 transition-all hover:shadow-xl w-fit px-6 text-white rounded-full p-2 font-bold"><?= isset($editar) ? 'Editar Blog' : 'Crear Blog' ?></button>
    </form>
</section>