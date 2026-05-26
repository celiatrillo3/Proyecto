let formulario = document.forms[0];

for (let i = 0; i < formulario.length; i++) {
    switch (i) {
        case "0":
            formulario[0].value = listaMoto['marca'];
            break;
        case "1":
            formulario[0].value = listaMoto['modelo'];
            break;
        case "2":
            formulario[0].value = listaMoto['año'];
            break;
        case "3":
            formulario[0].value = listaMoto['color'];
            break;
        case "4":
            formulario[0].value = listaMoto['historia'];
            break;
        case "5":
            formulario[0].value = listaMoto['nombre_pais'];
            break;
    }
}