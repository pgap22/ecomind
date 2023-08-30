<div class="flex bg-[#D1E4CF66] flex-col   md:items-center md:text-start justify-between gap-4 md:grid md:grid-cols-2">
    <div style="background-image: url('<?= $foro->imagen_url ?>');" class="bg-gray-500 bg-cover h-60 w-full md:h-full">

    </div>
    <div class="flex flex-col gap-5 md:grid md:grid-cols-2 md:py-8 p-2">

        <form method="post" class="flex gap-10 flex-col">
            <div class=" space-y-4">
                <h2 class="font-bold text-xl"><?= $foro->nombre ?></h2>
                <p><?= $foro->descripcion ?></p>
            </div>
            <input type="text" hidden name="id_foro" value=<?= $foro->id ?>>
            <button class="flex gap-2 items-center md:mt-8 w-fit">
                <img width="28" src="/imagenes/abandonar.svg" alt="">
                <p class="text-[#013B23] font-bold">Abandonar</p>
            </button>

        </form>

        <div class="flex gap-10 flex-col">
            <div class="flex items-center gap-4">
                <img src="/imagenes/usuarioForos.svg" alt="">
                <p>Usuarios Unidos</p>
                <p class="text-gray-600 font-bold"><?= $cantidadUsuarios ?></p>
            </div>

            <div class="flex items-center gap-4">
                <img src="/imagenes/fechaCreacion.svg" alt="">
                <div class="space-y-4">
                    <p>Fecha de Creacion</p>
                    <p class="text-gray-500 font-bold" id="fecha"><?= $foro->fecha_creacion ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-4">

    <form action="/foro/mensaje" method="post" class="flex gap-4">
        <input name="comentario" class="p-2 w-full bg-[#108D5933] rounded-md outline-none" type="text" placeholder="Enviar mensaje">
        <input type="text" hidden name="foro_id" value="<?= $foro->id ?>">

        <button class="bg-[#013B23BF] rounded-md p-2">
            <img width="32" src="/imagenes/enviarMensaje.svg" alt="">
        </button>
    </form>


    <div class="flex flex-col gap-6 mt-6">
        <?php foreach ($comentarios as $comentario) : ?>

            <?php
            if (isset($comentario['mensajePropio'])) {
                $clases = "bg-[#acc8a966]";
            } else {
                $clases = "bg-[#D8E9A8]";
            }
            ?>

            <div class="<?= $clases ?> p-4 rounded-md gap-5 grid grid-cols-[max-content_1fr]">
                <div class="flex items-start justify-center">
                    <img class="rounded-full w-12 aspect-square" src="<?= $comentario['imagen_url'] ?>" alt="">
                </div>
                <div class="max-w-full">
                    <div class="flex relative items-center">
                        <p class="font-bold"><?= $comentario["usuario"] ?></p>

                        <?php if ($idUsuario != $comentario['id_usuario'] && $comentario['rol'] == 'usuario') : ?>
                            <img class="cursor-pointer" onclick='acciones(<?= $comentario["id"] ?>,<?= $comentario["id_usuario"] ?>)' src="/imagenes/mas.svg" width="24" alt="">
                            <div data-reportar id="reportar-<?= $comentario['id'] ?>" class="absolute bg-white hidden flex-col border p-2 top-[10px] left-[76px]">
                                <button class="p-2 hover:bg-gray-100 rounded-md select-none cursor-pointer">Reportar Cuenta</button>
                            </div>
                        <?php endif ?>

                    </div>
                    <p class="break-all"><?= $comentario['mensaje'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>

<div id="modal_reporte" class="fixed flex transition-all opacity-animar items-center justify-center top-0 left-0 right-0 bottom-0 bg-black bg-opacity-75">
    <form action="/reportar?id_foro=<?= $foro->id ?>" method="post" class="bg-white space-y-2 p-4 rounded-md">
        <div class="w-full flex items-center justify-between">
            <h2 class="font-bold">Reporte De Mensaje</h2>
            <img onclick="quitarReporte()" width="32" src="/imagenes/cancel.svg" alt="">
        </div>
        <p>Porque quieres reportar esta cuenta</p>
        <select class="border-2 cursor-pointer w-full p-2" name="motivo">
            <option value="Spam">Spam</option>
            <option value="Incita al odio">Incita al odio</option>
            <option value="Bullying">Bullying</option>
            <option value="Estafa">Estafa</option>
            <option value="Informacion falsa">Informacion falsa</option>
            <option value="Violencia">Violencia</option>
        </select>
        <input name="id_comentario" type="text" hidden id="id_comentario">
        <button name="id" id="id_usuario" class="bg-green-700 text-white font-bold p-2 w-full text-center rounded-md">Enviar Reporte</button>
    </form>
</div>

<script defer>
    const fecha = document.getElementById("fecha");
    const modalReporte =document.getElementById("modal_reporte")
    const btnInput =document.getElementById("id_usuario");
    const comentarioInput =document.getElementById("id_comentario")

    function acciones(id,id_usuario) {
        const reportesDIVS = document.querySelectorAll("[data-reportar]")
        const reporteDiv = document.getElementById("reportar-" + id);

        if (reporteDiv.style.display == 'flex') {
            reportesDIVS.forEach(reporte => reporte.style.display = 'none')
            reporteDiv.style.display = 'none';
            
        } else {
            reportesDIVS.forEach(reporte => reporte.style.display = 'none')
            reporteDiv.style.display = 'flex';
            reporteDiv.onclick = ()=> mostrarReportar(id,id_usuario);
        }
    }

    modalReporte.addEventListener("click", e=>{
        if(e.target.id!="modal_reporte")return;
        modalReporte.classList.add("opacity-animar")
    })
    
    function mostrarReportar(id_mensaje, id_usuario){
        btnInput.value = id_usuario;
        comentarioInput.value = id_mensaje;
        modalReporte.classList.remove("opacity-animar")
    }
    
    function quitarReporte(){
        modalReporte.classList.add("opacity-animar")
    }

    fecha.innerHTML = new Date(fecha.textContent.split(" ")[0]).toLocaleString('es-ES', {
        weekday: 'long',
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    })
</script>