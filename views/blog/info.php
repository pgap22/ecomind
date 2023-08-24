<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script type="module" src="/js/editor.js"></script>
<script type="module" src="/js/blogRead.js"></script>

<script defer src="/js/foroFecha.js"></script>

<div style="background-image: url('<?= $blog->imagen_url ?>');" class="bg-cover relative p-6 flex justify-center items-center font-semibold h-60 md:h-[400px]">
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-black bg-opacity-50"></div>
    <div class="max-w-7xl text-white w-full relative z-40">
        <div class="flex flex-col items-center space-y-4">
            <h2 class="text-5xl"><?= $blog->titulo ?></h2>
            <p class="text-2xl"><?= $blog->subtitulo ?></p>
        </div>
    </div>
</div>



<div class="flex flex-col items-center">
    <div class="max-w-3xl w-full p-4">
        <div id="editorjs"></div>
        <input type="text" value="<?= $blog->contenido ?>" hidden id="contenido">
        <div class="flex items-center gap-2">
            <img class="w-12 aspect-square rounded-full" src="<?= $blog->imagen_usuario ?>" alt="">
            <p>Por: <span class="font-bold"><?= $usuarioBlog->nombre ?></span></p>
        </div>
    </div>

    <div class="max-w-7xl w-full p-4">
        <h2 class="font-bold text-3xl mt-8">Blogs Recomendados:</h2>
        <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3  gap-4 my-12 ">
            <?php foreach ($blogsRecomendados as $blog) :  ?>
                <div class="flex flex-col">
                    <div style="background-image: url('<?= $blog->imagen_url ?>');" class="bg-red-500 bg-no-repeat bg-cover bg-center h-[248px] rounded-t-xl">

                    </div>
                    <div class="relative rounded-b-xl flex flex-col border p-6 pb-2 h-full">
                        <img class="absolute top-0 -translate-y-1/2 right-10 aspect-square w-12 rounded-full" src="<?= $blog->imagen_usuario ?>" alt="">
                        <p class="text-gray-400 mb-4 font-semibold foro-date"><?= $blog->fecha_creacion ?></p>
                        <h2 class="font-bold text-xl mb-4"><?= $blog->titulo ?></h2>
                        <p class="text-gray-500 mb-4 break-words md:break-keep"><?= $blog->subtitulo ?></p>
                        <form action="/blogs/informacion" class="h-full flex items-end" method="get">

                            <input hidden type="text" name="id" value="<?= $blog->id ?>">

                            <button class="text-[#005025] flex group items-center font-bold">
                                <p>Entrar</p>
                                <img class="group-hover:translate-x-2 transition-all" width="23" src="/imagenes/flecha-foro.svg" alt="">
                            </button>

                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>