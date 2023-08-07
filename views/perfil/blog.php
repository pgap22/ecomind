<?php if (isset($_SESSION['alerta'])) : ?>
    <div onclick="this.style.display='none'" class="bg-green-100 cursor-pointer my-4 bg-opacity-70 border border-green-600 p-3 rounded-lg">
        <h2 class="font-medium mb-2">Blog Creado !</h2>
        <p class="text-gray-600">El Blog ha sido creado exitosamente</p>
    </div>
    <?php unset($_SESSION['alerta']) ?>
<?php endif ?>

<?php if (isset($_SESSION['editado'])) : ?>
    <div onclick="this.style.display='none'" class="bg-yellow-100 cursor-pointer my-4 bg-opacity-70 border border-yellow-600 p-3 rounded-lg">
        <h2 class="font-medium mb-2">Blog Editado !</h2>
        <p class="text-gray-600">El Blog ha sido editado exitosamente</p>
    </div>
    <?php unset($_SESSION['editado']) ?>
<?php endif ?>

<script defer src="/js/modalForo.js"></script>

<div id="black-screen" class="black-screen opacity-animar flex justify-center items-center">
    <div class="border border-red-600 bg-red-50 mx-8 rounded-md p-4 flex flex-col gap-6">
        <div class="flex justify-between">
            <div class="flex items-center gap-2">
                <img width="32" src="/imagenes/errorAlert.svg" alt="">
                <h2 class="font-bold">Eliminar Blog</h2>
            </div>
            <img onclick="toggleModal()" class="cursor-pointer" width="24" src="/imagenes/quit.svg" alt="">
        </div>
        <p class="text-gray-500">Si eliminas este Blog no habra forma de recuperarlo</p>
        <form method="post" class="w-full">
            <input type="text" name="id" hidden id="foro-id">
            <button class="p-2 px-4 bg-red-700 font-bold text-white rounded-full">Eliminar</button>
        </form>
 </div>
</div>

<section class="overflow-auto">
    <table class="bg-gray-50 w-full rounded-md">
        <thead>
            <tr class="text-sm">
                <th class="p-4 text-start">Numero de Blog</th>
                <th class="p-4 text-start">Titulo</th>
                <th class="p-4 text-start">Subtitulo</th>
                <!-- <th class="p-4 text-start">Contenido</th> -->
                <th class="p-4 text-start">Imagen</th>
                <th class="p-4 text-start">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog) : ?>
                <tr class=" odd:bg-[#00FF951A]">
                    <td class="p-4">#<?= $blog->getData('id') ?></td>
                    <td class="p-4"><?= $blog->getData('titulo') ?></td>
                    <td class="p-4"><?= $blog->getData('subtitulo') ?></td>
                    <td class="p-4"><img width="120" class=" min-w-[150px] aspect-auto object-cover rounded-lg" src="<?= $blog->getData('imagen_url') ?>" alt=""></td>
                    <td class="p-4">
                        <div class="grid grid-cols-2 gap-2">
                            <a href="/perfil/blog/editar?id=<?=$blog->id?>">
                                <img width="28" src="/imagenes/editTable.svg" alt="">
                            </a>
                            <img onclick="eliminarModal(this)" class="cursor-pointer" data-id="<?= $blog->getData('id') ?>" width="28" src="/imagenes/delete.svg" alt="">
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>