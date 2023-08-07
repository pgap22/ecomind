<script defer src="/js/foroFecha.js"></script>

<?php if (isset($foroUnido)) : ?>
    <div class="bg-[url('/imagenes/foroUnido.jpg')] flex justify-center items-center font-semibold py-24">
        <h1 class="text-white font-bold text-4xl">Foros Unidos</h1>
    </div>
<?php else : ?>
    <div class="flex justify-center bg-[#D1E4CF66]">
        <div class="max-w-6xl">

            <div class="flex flex-col text-center p-4 items-center md:text-start justify-between gap-4 md:grid md:grid-cols-2">
                <div class="flex flex-col gap-2">
                    <h2 class="font-bold text-2xl md:text-4xl">¡Bienvenidos a los foros de EcoMind!</h2>
                    <p class="text-[#545454]">Aquí encontrarás un espacio inspirador y lleno de ideas para promover la sostenibilidad y el cuidado del medio ambiente. Únete a nuestra comunidad de apasionados por la protección de nuestro planeta y comparte tus pensamientos, preguntas y proyectos relacionados con la sostenibilidad.</p>
                </div>
                <div class="flex justify-end">
                    <div class="max-w-sm">
                        <img src="/imagenes/foros-pagina.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>

<div class="flex justify-center">
    <div class="max-w-7xl w-full">

        <form class="flex flex-col md:flex-row my-12 p-4">
            <div class="border flex rounded-l-md">
                <img width="25" class="mx-2" src="/imagenes/search.svg" alt="">
                <input name="busqueda" value="<?= $_GET['busqueda'] ?? '' ?>" class="p-2 outline-none" type="text" placeholder="Escribe">
            </div>
            <button class="bg-[#005025] p-2 rounded-none md:p-0 md:px-3 md:rounded-r-md text-white font-medium">Buscar</button>
        </form>


        <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3  gap-4 my-12 p-4">

            <?php foreach ($foros as $foro) :  ?>
                <div class="flex flex-col">
                    <div style="background-image: url('<?= $foro->imagen_url ?>');" class="bg-red-500 bg-no-repeat bg-cover bg-center h-[248px] rounded-t-xl">

                    </div>
                    <div class="relative rounded-b-xl flex flex-col border p-6 pb-2 h-full">
                        <img class="absolute top-0 -translate-y-1/2 right-10 aspect-square w-12 rounded-full" src="<?= $foro->imagen_usuario ?>" alt="">
                        <p class="text-gray-400 mb-4 font-semibold foro-date"><?= $foro->fecha_creacion ?></p>
                        <h2 class="font-bold text-xl mb-4"><?= $foro->nombre ?></h2>
                        <p class="text-gray-500 mb-4 break-words md:break-keep"><?= $foro->descripcion ?></p>
                        <form class="h-full flex items-end" method="post">

                            <input hidden type="text" name="id" value="<?= $foro->id ?>">

                            <button class="text-[#005025] flex group items-center font-bold">
                                <p>Entrar</p>
                                <img class="group-hover:translate-x-2 transition-all" width="23" src="/imagenes/flecha-foro.svg" alt="">
                            </button>

                        </form>
                    </div>
                </div>
            <?php endforeach  ?>
        </div>
    </div>
</div>