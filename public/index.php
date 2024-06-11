<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Electrodomésticos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Calculadora de Electrodomésticos</h1>

        <form id="electrodomesticoForm" class="flex flex-col gap-2">
            <div>
                <label for="nombre" class="block text-gray-700 font-medium mb-1">Nombre del Electrodoméstico:</label>
                <input type="text" id="nombre" name="nombre" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div>
                <label for="color" class="block text-gray-700 font-medium mb-1">Color:</label>
                <select id="color" name="color" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="blanco">Blanco</option>
                    <option value="gris">Gris</option>
                    <option value="negro">Negro</option>
                </select>
            </div>
            <div>
                <label for="consumo" class="block text-gray-700 font-medium mb-1">Consumo Energético:</label>
                <select id="consumo" name="consumo" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div>
                <label for="peso" class="block text-gray-700 font-medium mb-1">Peso (Kg):</label>
                <input type="number" id="peso" name="peso" class="shadow appearance-none border rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Calcular Precio</button>
        </form>

        <!-- ... -->

<div id="resultados" class="mt-4 text-sm">
    <h2>Detalles del Electrodoméstico:</h2>
    <ul id="detalle-electrodomestico">
        <li id="nombre-electrodomestico"></li>
        <li id="color-electrodomestico"></li>
        <li id="consumo-electrodomestico"></li>
        <li id="peso-electrodomestico"></li>
        <li id="precio-base-electrodomestico"></li>
        <li id="descuento-electrodomestico"></li>
        <li id="precio-final-electrodomestico"></li>
    </ul>
    <h2>Resultado del Cálculo:</h2>
    <p id="resultado-calculo"></p>
</div>

<!-- ... -->

        <script src="/src/css/script.js"></script>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $consumo = $_POST['consumo'];
    $peso = $_POST['peso'];
    $descuento = $_POST['descuento'];

    // Precio base dependiendo del consumo energético
    $preciosBase = [
        "A" => 1000,
        "B" => 800,
        "C" => 600
    ];

    // Asignar precio base
    $precioBase = $preciosBase[$consumo];

    // Calcular descuento y precio final
    $descuentoTotal = $precioBase * $descuento;
    $precioFinal = $precioBase - $descuentoTotal;

    // Mostrar resultados
    echo json_encode([
        'nombre' => $nombre,
        'color' => $color,
        'consumo' => $consumo,
        'peso' => $peso,
        'precioBase' => $precioBase,
        'descuento' => $descuento * 100,
        'precioFinal' => $precioFinal
    ]);
    exit;
}
?>
