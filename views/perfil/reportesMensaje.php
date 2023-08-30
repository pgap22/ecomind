<?php  

?>

<div class="p-4">
    <h2 class="text-2xl">Mensajes de <span class="font-bold"><?= $usuarioReportado->nombre ?></span>
    </h2>
</div>

<div class="mt-4">
    <?php foreach($mensajes as $comentario): ?>
        <div class="p-4 rounded-md gap-5 grid grid-cols-[max-content_1fr]">
                <div class="flex items-start justify-center">
                    <img class="rounded-full w-12 aspect-square" src="<?= $usuarioReportado->imagen_url ?>" alt="">
                </div>
                <div class="max-w-full">
                    <div class="flex relative items-center">
                        <div class="flex flex-col">
                            <p class="font-bold"><?= $usuarioReportado->usuario ?></p>
                            <p class="font-bold text-red-700"><?=$comentario['motivo'] ?></p>
                        </div>
                    </div>
                    <p class="break-all"><?= $comentario['mensaje'] ?></p>
                </div>
            </div>
    <?php endforeach ?>
</div>