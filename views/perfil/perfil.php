<script defer src="/js/modalPerfil.js"></script>

<div id="modal-imagen" class="bg-black transition-all opacity-animar flex justify-center items-center fixed bg-opacity-80 top-0 left-0 right-0 bottom-0 z-30">
    <div class="bg-white max-w-[250px]  p-4 border rounded-md">
        <div class="flex justify-between items-center pb-2">
            <p class="font-bold">Cambiar Foto</p>
            <img id="toggle-modal" class="cursor-pointer" width="29" src="/imagenes/cancel.svg" alt="">
        </div>
        <label id="drop-zone" class="cursor-pointer" for="foto-perfil">
            <div class="p-4 aspect-square flex justify-center items-center border-2 rounded-md border-dotted">
                <p class="text-gray-400 text-center">Arrasta tu foto o haz click aqui</p>
            </div>
        </label>
        <p class="text-sm" id="foto-nombre"></p>
        <button id="btn-imagen" hidden class="bg-green-600 w-full mt-2 bg-opacity-75 text-white p-1 rounded-full">Cambiar Imagen</button>
    </div>
</div>



<div class="xl:grid grid-cols-2 max-w-7xl">
    <div>
        <section class="mt-4">
            <h2 class="titulo">Personal Details</h2>
            <div id="error-alert" class="max-w-xs my-4 cursor-pointer">
                <?= mostrarError($cambiosUsuario ?? ''); ?>
            </div>
            <div class="sm:grid grid-cols-[max-content_1fr] gap-6 items-center">
                <div class="relative w-fit mb-4">
                    <img width="220" class="rounded-lg" src="<?= $usuario['imagen_url'] ?>" alt="">

                    <div id="cambiar-foto" class="absolute bottom-2 cursor-pointer bg-white opacity-75 w-[80%] text-center py-2 rounded-full left-1/2 -translate-x-1/2">
                        <p class="text-sm">Cambiar Foto</p>
                    </div>
                </div>


                <form enctype="multipart/form-data" id="actualizar-usuario" method="post" class="flex flex-col gap-4 sm:max-w-[190px]">

                    <input name="imagen_url" accept="image/*" hidden type="file" id="foto-perfil">

                    <div class="max-w-xs space-y-2">
                        <h3 class="subtitulo">Nombre: </h3>

                        <div class="grid gap-2 grid-cols-[1fr_max-content]">
                            <p data-nombre="<?= $usuario['nombre'] ?>" class=" break-words"><?= $usuario['nombre'] ?></p>
                            <input name="nombre" hidden id="campo-nombre" type="text" value="<?= $usuario['nombre'] ?>" class="outline-none input-cambios border-b border-b-green-700">
                            <img class="editar-campo cursor-pointer" data-campo="nombre" src="/imagenes/edit.svg" alt="">
                        </div>

                    </div>

                    <div class="max-w-xs space-y-2">
                        <h3 class="subtitulo">Usuario: </h3>

                        <div class="grid grid-cols-[1fr_max-content]">
                            <p data-usuario="<?= $usuario['usuario'] ?>" class=" break-words"><?= $usuario['usuario'] ?></p>
                            <input name="usuario" hidden id="campo-usuario" type="text" value="<?= $usuario['usuario'] ?>" class="outline-none input-cambios border-b border-b-green-700">
                            <img class="editar-campo cursor-pointer" data-campo="usuario" src="/imagenes/edit.svg" alt="">
                        </div>

                    </div>

                    <div class="max-w-xs space-y-2">
                        <h3 class="subtitulo">Correo: </h3>

                        <div class="grid grid-cols-[1fr_max-content]">
                            <p data-email="<?= $usuario['email'] ?>" class=" break-words"><?= $usuario['email'] ?></p>
                            <input name="email" hidden id="campo-email" type="text" value="<?= $usuario['email'] ?>" class="outline-none input-cambios border-b border-b-green-700">
                            <img class="editar-campo cursor-pointer" data-campo="email" src="/imagenes/edit.svg" alt="">
                        </div>

                    </div>

                    <button id="btn-cambios" class="bg-green-700 bg-opacity-70 p-2 rounded-full text-white">Guardar cambios</button>



                </form>

            </div>
        </section>


        <section class="mt-4">
            <h2 class="titulo">Foros</h2>

            <div class="flex flex-col gap-4">
                <div>
                    <h3 class="subtitulo">Foros Unidos</h3>
                    <p>0</p>
                </div>

                <div>
                    <h3 class="subtitulo">Foros Creados</h3>
                    <p><?= count($foros ?? []) ?></p>
                </div>

                <div>
                    <h3 class="subtitulo">Blogs Creados</h3>
                    <p><?= count($blogs ?? []) ?></p>
                </div>

            </div>
        </section>


    </div>
    <div class="lg:flex justify-between xl:flex-col">
        <section class="mt-4">
            <h2 class="titulo">Ultimo Foro Unido</h2>
            <div class="max-w-[320px] mt-4 w-fit relative">
                <img class="aspect-square object-cover rounded-xl" src="/foroimg/default_3.jpg" alt="">

                <div class="absolute bottom-2 cursor-pointer bg-white opacity-80 w-[80%] text-center py-2 rounded-full left-1/2 -translate-x-1/2">
                    <p class="text-lg font-bold break-words text-[#272D37]">EcoConsejos Sostenibles</p>
                </div>
            </div>
        </section>
        <?php if ($ultimoForoCreado->id) : ?>
            <section class="mt-4">
                <h2 class="titulo">Ultimo Foro Creado</h2>
                <div class="max-w-[320px] mt-4 w-fit relative">
                    <img class="aspect-square object-cover rounded-xl" src="<?=$ultimoForoCreado->imagen_url ?>"  alt="">

                    <div class="absolute bottom-2 cursor-pointer bg-white opacity-80 w-[80%] text-center py-2 rounded-full left-1/2 -translate-x-1/2">
                        <p class="text-lg font-bold break-words text-[#272D37]"><?=$ultimoForoCreado->nombre?> </p>
                    </div>
                </div>
            </section>
        <?php endif ?>


    </div>

</div>