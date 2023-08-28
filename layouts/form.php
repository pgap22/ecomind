<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo ?? 'Titulo' ?> | Ecomind</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <main class="md:grid md:grid-cols-2 min-h-screen">
        <div class="login-bg"></div>
        <div class="p-8 self-center">
            <section class="flex flex-col gap-5 p-4 border shadow-md rounded-md">
                <?php include $contenido ?>
            </section>
        </div>
    </main>

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

</body>

</html>