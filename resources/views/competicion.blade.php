<!DOCTYPE html>
<html lang ="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Competición</title>
    </head>
    <body class="flex flex-col min-h-screen">
        <main class="flex-grow">
        <x-header />
        <div class="h-[68px]"></div>
        <x-competicion :competicion="$competicion" />
        <x-campeones :torneos="$torneos" />
        <x-tabla-campeon :campeones="$campeones" />
        <x-sugerencias :sugerencias="$sugerencias" />
        </main>
        <x-footer />
    </body>
</html>