<nav class="p-6 flex flex-col gap-5">
    <div class="flex gap-2 items-center">
        <img width="32" class="rounded-full aspect-square" src="<?= $usuario['imagen_url'] ?>" alt="">
        <p><?= $usuario['nombre'] ?></p>
    </div>

    <a href="/perfil" class="flex items-center cursor-pointer gap-2 p-2 <?= activeLink('perfil', $active) ?>">
        <img width="32" src="/imagenes/usuarioPerfil.svg" alt="">
        <p>Perfil</p>
    </a>

    <a href="/perfil/foro/crear" class="flex items-center cursor-pointer gap-2 p-2 <?= activeLink('crearForo', $active) ?>">
        <img width="32" src="/imagenes/crearForoPerfil.svg" alt="">
        <p>Crear Foro</p>
    </a>

    <a href="/perfil/foro" class="flex items-center cursor-pointer gap-2 p-2 <?= activeLink('foroCreados', $active) ?>">
        <img width="32" src="/imagenes/creadosForo.svg" alt="">
        <p>Foros Creados</p>
    </a>

    <a href="/perfil/blog/crear" class="flex items-center cursor-pointer gap-2 p-2 <?= activeLink('crearBlog', $active) ?>">
        <img width="32" src="/imagenes/crearBlog.svg" alt="">
        <p>Crear Blog</p>
    </a>

    <a href="/perfil/blog" class="flex items-center cursor-pointer gap-2 p-2 <?= activeLink('blogCreados', $active) ?>">
        <img width="32" src="/imagenes/creadosBlog.svg" alt="">
        <p>Blog Creados</p>
    </a>

    <?php if ($_SESSION['usuario']['rol']=="admin") : ?>
        <a href="/perfil/reportes" class="flex items-center cursor-pointer gap-2 p-2 <?= activeLink('reportes', $active) ?>">
            <img width="32" src="/imagenes/reporte.svg" alt="">
            <p>Reportes</p>
        </a>
    <?php endif ?>
</nav>