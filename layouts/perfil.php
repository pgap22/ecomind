<?php $usuario = $_SESSION['usuario'] ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? '' ?> | Ecomind</title>
    <?php include("./../includes/headers.php") ?>
    <script defer src="/js/menuPerfil.js"></script>
</head>

<body class="bg-[#F5F5F5] p-2 md:grid grid-cols-[max-content_minmax(0,1fr)]">

    <div id="bg-mobile" class="bg-black md:hidden transition-all fixed bg-opacity-80 opacity-animar top-0 left-0 right-0 bottom-0 z-30">

    </div>

    <div id="menu-mobile" class="fixed rounded-r-lg bg-[#F5F5F5] transition-all z-50 esconder-menu-perfil left-0 bottom-0 top-0">
        <?php include("./../includes/layouts/perfil/perfilNav.php") ?>
    </div>

    <div class="hidden md:block">
        <?php include("./../includes/layouts/perfil/perfilNav.php") ?>
    </div>

    <main class="bg-white rounded-3xl p-4 md:p-6 ">
        <header class="p-1 flex flex-col gap-4">
            <div id="toggle-menu" class="bg-[#013B23] w-fit h-fit p-1.5 rounded-lg md:hidden">
                <img width="25" src="/imagenes/menuPerfil.svg" alt="">
            </div>

            <a href="/" class="w-fit">
                <div class="flex gap-2 items-center">
                    <img width="24" class="rounded-full" src="/imagenes/back.svg" alt="">
                    <p class=" break-words">Volver al inicio</p>
                </div>
            </a>
        </header>
        <?php include $contenido ?>


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

    </main>
</body>

</html>