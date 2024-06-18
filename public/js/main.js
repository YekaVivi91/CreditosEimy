document.getElementById('electrodomesticoForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Validar nombre
    const nombre = document.getElementById('nombre').value.trim();
    const nombreError = document.getElementById('nombreError');
    if (!/^[a-zA-Z]+$/.test(nombre)) {
        nombreError.style.display = 'block';
        isValid = false;
    } else {
        nombreError.style.display = 'none';
    }

    // Validar peso
    const peso = document.getElementById('peso').value.trim();
    const pesoError = document.getElementById('pesoError');
    if (!/^\d+$/.test(peso)) {
        pesoError.style.display = 'block';
        isValid = false;
    } else {
        pesoError.style.display = 'none';
    }

    if (!isValid) {
        event.preventDefault();
    }
});
