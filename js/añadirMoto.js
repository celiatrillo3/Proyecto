let optionsPaises = document.getElementById('paises');

for (const pais of resultadoPaises) {
    let option = document.createElement('option');
    option.setAttribute('value', pais['nombre_pais']);
    option.textContent = pais['nombre_pais'];
    optionsPaises.appendChild(option);
}