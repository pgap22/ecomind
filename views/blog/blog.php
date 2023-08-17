<script defer src="/js/foroFecha.js"></script>

<div class="bg-[url('/imagenes/blogs_bg.jpg')] bg-cover p-6 flex justify-center items-end font-semibold pt-32">
   <div class="max-w-7xl w-full">
    <div class="flex flex-col space-y-4">
            <h1 class="text-white font-bold text-4xl">Blogs De Ecomind</h1>
            <p class="text-white font-medium">Explora este espacio enriquecedor repleto de inspiración y conceptos para fomentar la sostenibilidad y el respeto al entorno. Sumérgete en nuestra comunidad de entusiastas comprometidos con la preservación de nuestro planeta, y comparte tus reflexiones, inquietudes y proyectos sobre sostenibilidad a través de nuestros cautivadores blogs.</p>
        </div>
   </div>
</div>



<div class="flex justify-center">
    <div class="max-w-7xl w-full">
        <h2 class="font-bold text-xl md:text-3xl my-12">Todos los blogs</h2>

        <div class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3  gap-4 my-12 ">

            <?php foreach($blogs as $blog):  ?>
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