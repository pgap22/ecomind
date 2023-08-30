<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomind</title>
    <?php include("./../includes/headers.php") ?>
    <script defer src="/js/menu.js"></script>
</head>

<body class="">

    <!-- Menu mobile -->
    <div id="bg-mobile" class="bg-black transition-all fixed bg-opacity-80 opacity-animar top-0 left-0 right-0 bottom-0 z-30">

    </div>
    <div id="menu-mobile" class="fixed bg-[#D1E4CF] transition-all z-50 esconder-menu right-0 bottom-0 top-0">
        <nav class="p-4 flex flex-col gap-5">
            <a href="/" class="font-bold text-[#1D1D1D]">Inicio</a>
            <a href="/blogs" class="font-bold text-[#1D1D1D]">Blog</a>
            <a href="/foros" class="font-bold text-[#1D1D1D]">Foros</a>
            <a href="/sobre-nosotros" class="font-bold text-[#1D1D1D]">Sobre Nosotros</a>

            <?=$navMobile?>
        </nav>
    </div>

    <div class="p-4 bg-[#D1E4CF66] flex flex-col items-center ">
        <div class="max-w-7xl">
            <header class="flex justify-between items-center">
                <a href="/">
                    <img width="50" class="md:w-24" src="/imagenes/logo.svg" alt="">
                </a>
                <nav class="hidden md:flex justify-between items-center gap-4">
                    <a href="/" class="font-bold text-[#1D1D1D]">Inicio</a>
                    <a href="/blogs" class="font-bold text-[#1D1D1D]">Blog</a>
                    <a href="/foros" class="font-bold text-[#1D1D1D]">Foros</a>
                    <a href="/sobre-nosotros" class="font-bold text-[#1D1D1D]">Sobre Nosotros</a>

                    <?=$navDesktop?>
                </nav>

                <svg id="toggle-menu" xmlns="http://www.w3.org/2000/svg" class="md:hidden" width="32" height="32" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </header>

            <section class="mt-6 text-center flex flex-col items-center md:grid md:grid-cols-2 md:text-start md:justify-center">
                <div class="space-y-4">
                    <h1 class="font-bold text-3xl md:text-5xl xl:text-6xl ">La Felicidad Florece desde Adentro</h1>
                    <p>Nuestro entorno, el mundo en el que vivimos y trabajamos, es un espejo de nuestras actitudes y expectativas.</p>
                </div>
                <div class="">
                    <img src="./imagenes/hero.png" alt="">
                </div>
            </section>

            <section class="bg-[#004F44] xl:gap-12 relative z-10 -mb-28 p-6 rounded-lg text-white space-y-8 max-w-md mx-auto md:grid md:grid-cols-3 md:max-w-none md:items-center md:space-y-0">

                <div class="caracteristica-item">
                    <div class="bg-[#FFFFFF33] p-4 rounded-2xl w-fit">
                        <img src="/imagenes/icon_1.png" class="aspect-square" alt="sostenibilidad">
                    </div>

                    <div class="lg:grid lg:grid-rows-[fit-content_1fr] lg:gap-4 lg:max-w-xs">
                        <h2 class="caracteristica-titulo">Sostenibilidad</h2>
                        <p class="caracteristica-texto">Cuidar el medio ambiente es fundamental para asegurar un futuro sostenible para las generaciones presentes y futuras.</p>
                    </div>
                </div>

                <div class="caracteristica-item">
                    <div class="bg-[#FFFFFF33] p-4 rounded-2xl w-fit">
                        <img src="/imagenes/icon_2.png" class="aspect-square" alt="sostenibilidad">
                    </div>
                    <div class="lg:grid lg:grid-rows-[fit-content_1fr] lg:gap-4 lg:max-w-xs">
                        <h2 class="caracteristica-titulo">Recursos naturales</h2>
                        <p class="caracteristica-texto">Proteger el medio ambiente garantiza la conservación de recursos vitales como el agua, el aire limpio y los alimentos.</p>
                    </div>
                </div>

                <div class="caracteristica-item">
                    <div class="bg-[#FFFFFF33] p-4 rounded-2xl w-fit">
                        <img src="/imagenes/icon_3.png" class="aspect-square" alt="sostenibilidad">
                    </div>
                    <div class="lg:grid lg:grid-rows-[fit-content_1fr] lg:gap-4 lg:max-w-xs">
                        <h2 class="caracteristica-titulo">Calidad de vida</h2>
                        <p class="caracteristica-texto">Cuidar el medio ambiente crea entornos habitables y agradables, mejorando nuestra calidad de vida.</p>
                    </div>
                </div>

            </section>

        </div>
    </div>

    <div class="bg-white w-full pb-40"></div>

    <div class="w-full bg-[#D1E4CF66] flex justify-center">
        <section class="p-4 max-w-7xl flex flex-col items-center gap-12 md:grid md:grid-cols-2 lg:gap-20">
            <div class="space-y-6 md:order-2 max-w-md md:max-w-none ">
                <h2 class="capitalize font-bold text-2xl md:text-5xl">foros interactivos para compartir y aprender</h2>

                <div class="grid grid-cols-[max-content_1fr] gap-4">
                    <div class="bg-[#013B23] w-12 md:w-16 flex items-center justify-center aspect-square rounded-lg">
                        <img width="26" class="md:w-10" src="/imagenes/interactivo.svg" alt="">
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Interactivos</h3>
                        <p>Los usuarios interactuan entre ellos</p>
                    </div>
                </div>

                <div class="grid grid-cols-[max-content_1fr] gap-4">
                    <div class="bg-[#013B23] w-12 md:w-16  flex items-center justify-center aspect-square rounded-lg">
                        <img width="26" class="md:w-10" src="/imagenes/educacion.svg" alt="">
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Educacion</h3>
                        <p>Promueve la educacion ambiental</p>
                    </div>
                </div>

            </div>


            <div class="flex justify-end md:justify-start">

                <div class="max-w-xs">
                    <img src="/imagenes/foros.svg" alt="mujer en los foros">
                </div>
            </div>
        </section>
    </div>

    <div class="flex flex-col gap-4 bg-white">

        <section class="text-center py-10 p-4 space-y-12 flex flex-col items-center">
            <div class="space-y-4">
                <h2 class="font-bold capitalize text-3xl md:text-5xl">Algunas de las plantas</h2>
                <p class="text-[#707070] md:text-xl">Que puedes encontar en tu entorno son:</p>
            </div>
            <div class="grid grid-cols-2 xl:grid-cols-4 items-center gap-4">
                <img class="rounded-md" src="/imagenes/planta.jpg" alt="planta">
                <img class="rounded-md" src="/imagenes/planta2.jpg" alt="planta">
                <img class="rounded-md" src="/imagenes/planta3.jpg" alt="planta">
                <img class="rounded-md" src="/imagenes/planta4.jpg" alt="planta">
            </div>
        </section>


        <section class="p-4 text-center space-y-8">
            <div class="space-y-2">
                <h2 class="font-bold capitalize text-2xl md:text-5xl">¿Porque es importante?</h2>
                <p class="text-[#707070] md:text-xl">Cuidar el medio ambiente</p>
            </div>

            <div>

                <div class="flex flex-col gap-4 items-center md:grid md:grid-cols-3 max-w-5xl md:max-w-7xl md:gap-4 mx-auto">
                    <div class="shadow-xl p-8 text-start rounded-md">
                        <p class="text-[#5C5C5C] text-xl">Alberga una amplia variedad de especies y ecosistemas interconectados. Cuidarlo garantiza la supervivencia de numerosas especies y protege la estabilidad de los ecosistemas.</p>
                    </div>
                    <div class="shadow-xl p-8 text-start rounded-md">
                        <p class="text-[#5C5C5C] text-xl">Alberga una amplia variedad de especies y ecosistemas interconectados. Cuidarlo garantiza la supervivencia de numerosas especies y protege la estabilidad de los ecosistemas.</p>
                    </div>
                    <div class="shadow-xl p-8 text-start rounded-md">
                        <p class="text-[#5C5C5C] text-xl">Alberga una amplia variedad de especies y ecosistemas interconectados. Cuidarlo garantiza la supervivencia de numerosas especies y protege la estabilidad de los ecosistemas.</p>
                    </div>
                </div>

                
            </div>


        </section>


        <section class="p-4 mt-4 space-y-8 text-center flex flex-col items-center">
            <div>
                <h2 class="font-bold text-2xl md:text-5xl">Puedes Promover</h2>
                <p class="text-[#5C5C5C] md:text-xl">Un mejor cuido al medio ambiente</p>
            </div>

            <div class="flex flex-col items-center md:grid md:grid-cols-3 gap-4">
                <div class="p-2 border shadow-lg rounded-lg space-y-4 text-start max-w-sm">
                    <img class="rounded-lg" src="/imagenes/promover.jpg" alt="promover imagen">

                    <div class="space-y-4">
                        <h3 class="font-bold text-xl">Comunicación efectiva</h3>
                        <p class="text-[#5C5C5C]">Puedes difundir información de cuido de plantas, consejos prácticos y noticias positivas sobre el medio ambiente. Mantén una comunicación constante y cercana con tu audiencia.</p>
                    </div>
                </div>
                <div class="p-2 border shadow-lg rounded-lg space-y-4 text-start max-w-sm">
                    <img class="rounded-lg" src="/imagenes/promover.jpg" alt="promover imagen">

                    <div class="space-y-4">
                        <h3 class="font-bold text-xl">Comunicación efectiva</h3>
                        <p class="text-[#5C5C5C]">Puedes difundir información de cuido de plantas, consejos prácticos y noticias positivas sobre el medio ambiente. Mantén una comunicación constante y cercana con tu audiencia.</p>
                    </div>
                </div>
                <div class="p-2 border shadow-lg rounded-lg space-y-4 text-start max-w-sm">
                    <img class="rounded-lg" src="/imagenes/promover.jpg" alt="promover imagen">

                    <div class="space-y-4">
                        <h3 class="font-bold text-xl">Comunicación efectiva</h3>
                        <p class="text-[#5C5C5C]">Puedes difundir información de cuido de plantas, consejos prácticos y noticias positivas sobre el medio ambiente. Mantén una comunicación constante y cercana con tu audiencia.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-4 mt-8 flex justify-center">
            <div class="bg-[#013B23] max-w-7xl w-full relative overflow-hidden text-white  text-center rounded-md flex justify-center ">
                <div class="space-y-6 max-w-4xl p-10 ">
                    <h3 class="text-2xl xl:text-4xl font-semibold !leading-snug">“El cuidado del medio ambiente es nuestra responsabilidad para preservar el hogar que compartimos con todas las especies"</h3>
                    <p>Cada pequeña acción individual en favor del medio ambiente se suma a un gran impacto positivo</p>
                </div>

                <img class="absolute hidden xl:block -top-12 -left-12" src="./imagenes/footer_deco.svg" alt="">
                <img class="absolute hidden xl:block -top-12 -right-12 rotate-45" src="./imagenes/footer_deco.svg" alt="">

            </div>

        </section>

    </div>


    <div class="fixed  bottom-0 left-0 bg-white p-2 border rounded-md" id="google_translate_element"></div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                includedLanguages: "en,es",
                autoDisplay: false,
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    
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