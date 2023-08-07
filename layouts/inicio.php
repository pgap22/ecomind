<?php

$usuario = $_SESSION['usuario'] ?? '';
$navMobile = navUserButton("usuario-opciones-mobile", "usuario-menu-mobile");
$navDesktop =  navUserButton("usuario-opciones", "usuario-menu");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros | Ecomind</title>
    <script defer src="/js/menu.js"></script>
    <?php include("./../includes/headers.php")  ?>
</head>

<body>


    <div id="bg-mobile" class="bg-black transition-all fixed bg-opacity-80 opacity-animar top-0 left-0 right-0 bottom-0 z-30">

    </div>

    <div id="menu-mobile" class="fixed bg-[#D1E4CF] transition-all z-50 esconder-menu right-0 bottom-0 top-0">
        <nav class="p-4 flex flex-col gap-5">
            <a href="/" class="font-bold text-[#1D1D1D]">Inicio</a>
            <a href="/blogs" class="font-bold text-[#1D1D1D]">Blog</a>
            <a href="/foros" class="font-bold text-[#1D1D1D]">Foros</a>
            <a href="/sobre-nosotros" class="font-bold text-[#1D1D1D]">Sobre Nosotros</a>

            <?= $navMobile ?>
        </nav>
    </div>

    <div class="p-4 flex flex-col items-center ">
        <div class="max-w-7xl w-full">
            <header class="flex justify-between items-center">
                <img width="50" class="md:w-24" src="/imagenes/logo.svg" alt="">

                <nav class="hidden md:flex justify-between items-center gap-4">
                    <a href="/" class="font-bold text-[#1D1D1D]">Inicio</a>
                    <a href="/blogs" class="font-bold text-[#1D1D1D]">Blog</a>
                    <a href="/foros" class="font-bold text-[#1D1D1D]">Foros</a>
                    <a href="/sobre-nosotros" class="font-bold text-[#1D1D1D]">Sobre Nosotros</a>

                    <?= $navDesktop ?>
                </nav>

                <svg id="toggle-menu" xmlns="http://www.w3.org/2000/svg" class="md:hidden" width="32" height="32" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </header>
        </div>
    </div>

    <div class="min-h-[calc(100vh-(99px+136px))]">
        <?php include $contenido ?>
    </div>

    <footer class="bg-[#D1E4CF66] p-4 space-y-2 items-center xl:flex xl:justify-between">
        <img width="62" src="/imagenes/logo.svg" alt="logo">
        <div class="flex flex-col xl:flex-row xl:border-none gap-4 py-4 border-t border-b border-green-700">
            <a href="/" class="font-bold text-[#1D1D1D]">Inicio</a>
            <a href="/blogs" class="font-bold text-[#1D1D1D]">Blog</a>
            <a href="/foros" class="font-bold text-[#1D1D1D]">Foros</a>
            <a href="/sobre-nosotros" class="font-bold text-[#1D1D1D]">Sobre Nosotros</a>
        </div>
        <p>ecomind@gmail.com</p>
        <p>Derechos reservados 2023</p>
    </footer>
</body>

</html>