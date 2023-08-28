<?php if (isset($_SESSION['mensaje'])) : ?>
    <div onclick="this.style.display='none'" class="bg-yellow-100 cursor-pointer my-4 bg-opacity-70 border border-yellow-600 p-3 rounded-lg">
        <h2 class="font-medium"><?= $_SESSION['mensaje'] ?></h2>
        <!-- <p class="text-gray-600">El Blog ha sido editado exitosamente</p> -->
    </div>
    <?php unset($_SESSION['mensaje']) ?>
<?php endif ?>


<section class="overflow-auto">
    <table class="bg-gray-50 w-full rounded-md">
        <thead>
            <tr class="text-sm">
                <th class="p-4 text-start">Usuario Reportado</th>
                <th class="p-4 text-start">N° de veces reportado</th>
                <th class="p-4 text-start">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportes as $reporte) : ?>
                <tr class=" odd:bg-[#00FF951A]">
                    <td class="p-4"><?= $reporte['nombre'] ?></td>
                    <td class="p-4"><?= $reporte['cantidad_repeticiones'] ?></td>
                    <td>
                        <form action="/banear" method="post" class="p-4">
                            <a href="/perfil/reportes/mensajes?id=<?= $reporte['id_usuarioReportado'] ?>" class="p-2 bg-green-800 rounded-md text-white font-bold">Ver Mensajes</a>
                            <?php if ($reporte['estado'] == "ban") : ?>
                                <button name="id" value="<?= $reporte['id_usuarioReportado'] ?>" class="p-2 bg-gray-800 rounded-md text-white font-bold">Desbanear</button>
                            <?php else : ?>
                                <button name="id" value="<?= $reporte['id_usuarioReportado'] ?>" class="p-2 bg-red-800 rounded-md text-white font-bold">Banear</button>
                            <?php endif ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>