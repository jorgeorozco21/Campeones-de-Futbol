<!DOCTYPE html>
<html lang ="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Buscador</title>
    </head>
    <body class="bg-[#3B9D36] flex flex-col min-h-screen">
        <main class="flex-grow">
        <x-header />
        <div class="h-[68px]"></div>
        <x-buscador-competicion />
        <x-card-competicion-horizontal />
        </main>
        <x-footer />
    </body>
</html>