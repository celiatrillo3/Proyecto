let optionsPaises = document.getElementById('paises');

for (const pais of resultadoPaises) {
    let option = document.createElement('option');
    option.setAttribute('value', pais['nombre_pais']);
    option.textContent = pais['nombre_pais'];
    optionsPaises.appendChild(option);
}


let formulario = document.forms[0];

for (let i = 0; i < formulario.length; i++) {

    switch (i) {
        case 0:
            formulario[i].value = listaMoto[0]['nombre'];
            break;

        case 1:
            formulario[i].value = listaMoto[0]['modelo'];
            break;

        case 2:
            formulario[i].value = listaMoto[0]['año'];
            break;

        case 3:
            formulario[i].value = listaMoto[0]['color'];
            break;

        case 4:
            formulario[i].value = listaMoto[0]['historia'];
            break;

        case 5:
            formulario[i].value = listaMoto[0]['nombre_pais'];
            break;
    }
}

console.log(listaRutas);
let divModificarImagenes = document.getElementById('modificarImagenes');
for (let i = 0; i < listaRutas.length; i++) {
    let div = document.createElement('div');
    div.setAttribute('class', 'col-sm-11 col-md-5 col-lg-3');

    let img = document.createElement('img');
    img.setAttribute('src', listaRutas[i]['ruta_imagen']);
    img.setAttribute('class', 'img-fluid');
    img.setAttribute('name', 'imagenes[]');
    img.setAttribute('value', i);

    let input = document.createElement('input');
    input.setAttribute('type', 'checkbox');

    div.appendChild(img);
    div.appendChild(input);

    divModificarImagenes.appendChild(div);
}