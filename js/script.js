//Menu dropdown dinamico
let menuDinamico = document.getElementById("menuDinamico");
let años = 50;
let listaAñosMarcas = [["Benelli", "Derbi", "Rieju", "Moto Guzzi"], ["Montesa", "Bultaco", "Ossa", "Puch"], ["Piaggio", "Ducati", "Derbi", "Peugeot"], ["Mobylette", "Motobecane", "Piaggio", "Reiju"], ["Derbi", "Aprilio", "Gilera", "Puch"]];
let indiceListaAñosMarcas = 0;
for (let i = 0; i < 5; i++) {
    let subcontenedorMenuDinamico = document.createElement("div");
    subcontenedorMenuDinamico.setAttribute('class', 'subcontenedorMenuDinamico');
    let enlaceMenuDiamicoA = document.createElement("a");
    enlaceMenuDiamicoA.textContent = `AÑOS ${años}`;
    años = años + 10;
    let marcaUl = document.createElement("ul");
    for (let j = 0; j < 4; j++) {
        let marcaLi = document.createElement("li");
        let marcaA = document.createElement("a");
        marcaA.textContent = listaAñosMarcas[indiceListaAñosMarcas][j];
        marcaLi.appendChild(marcaA);
        marcaUl.appendChild(marcaLi);
    }
    indiceListaAñosMarcas++;
    subcontenedorMenuDinamico.appendChild(enlaceMenuDiamicoA);
    subcontenedorMenuDinamico.appendChild(marcaUl);
    //menuDinamico.appendChild(subcontenedorMenuDinamico);
}

//Mostrar el input buscador
let iconoBuscador = document.getElementById('buscador');
function mostarBuscador() {
    let inputBuscador = document.getElementById('buscadorInput');
    if (inputBuscador.getAttribute('style') == "display: block;") {
        inputBuscador.setAttribute('style', 'display: none;');
    }else{
        inputBuscador.setAttribute('style', 'display: block;');
    }
}

//Este es para el buscador para dispositivos pequeños
iconoBuscador.addEventListener('click', mostarBuscador);

let iconoBuscador2 = document.getElementById('buscador2');
function mostarBuscador2() {
    let inputBuscador2 = document.getElementById('buscadorInput2');
    if (inputBuscador2.getAttribute('style') == "display: block;") {
        inputBuscador2.setAttribute('style', 'display: none;');
    }else{
        inputBuscador2.setAttribute('style', 'display: block;');
    }
}

iconoBuscador2.addEventListener('click', mostarBuscador2);


//Esto es un intento de que funcionen a la vez
// let iconoBuscador = document.getElementsByClassName('buscador');

// function mostarBuscador() {
//     let inputBuscador = document.getElementById('buscadorInput');
//     for (const element2 of inputBuscador) {
//         element2.setAttribute('style', 'display: none;');
//         // if (element2.getAttribute('style') == "display: block;") {
//         //     element2.setAttribute('style', 'display: none;');
//         // }else{
//         //     element2.setAttribute('style', 'display: block;');
//         // }
//     }
    
// }

// for (const element of iconoBuscador) {
//     element.addEventListener('click', mostarBuscador);
// }
