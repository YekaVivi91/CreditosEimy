document.getElementById('electrodomesticoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const color = document.getElementById('color').value;
    const consumo = document.getElementById('consumo').value;
    const peso = document.getElementById('peso').value;

    // Validación básica
    if (!/^[a-zA-Z\s]+$/.test(nombre) || nombre.length < 3) {
        alert('El nombre del electrodoméstico debe contener solo letras y tener al menos 3 caracteres.');
        return;
    }

    if (isNaN(peso) || peso <= 0 || peso > 49) {
        peso = 1; // Asignar peso por defecto de 1 kg
    }

    // Asignar consumo energético por defecto si no está entre A y C
    if (consumo < 'A' || consumo > 'C') {
        consumo = 'A'; // Asignar consumo energético por defecto de A
    }

    // Calcular descuento
    let descuento = 0;
    switch (color) {
        case 'blanco':
            descuento = 0.05;
            break;
        case 'gris':
            descuento = 0.07;
            break;
        case 'negro':
            descuento = 0.10;
            break;
    }

    // Calcular precio base
    const precioBase = 100;

    // Calcular descuento total
    const descuentoTotal = precioBase * descuento;

    // Calcular precio final
    const precioFinal = precioBase - descuentoTotal;

    // Mostrar resultados
    document.getElementById('nombre-electrodomestico').textContent = `Nombre: ${nombre}`;
    document.getElementById('color-electrodomestico').textContent = `Color: ${color}`;
    document.getElementById('consumo-electrodomestico').textContent = `Consumo Energético: ${consumo}`;
    document.getElementById('peso-electrodomestico').textContent = `Peso: ${peso} kg`;
    document.getElementById('precio-base-electrodomestico').textContent = `Precio Base: $${precioBase}`;
    document.getElementById('descuento-electrodomestico').textContent = `Descuento: ${descuento * 100}%`;
    document.getElementById('precio-final-electrodomestico').textContent = `Precio Final: $${precioFinal.toFixed(2)}`;

    document.getElementById('resultado-calculo').textContent = `El precio final del electrodoméstico es de $${precioFinal.toFixed(2)}`;
});