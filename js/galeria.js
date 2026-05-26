//Imagenes dinamicas para la galeria
let divGaleria = document.getElementById('divGaleria');
let clasesDivs = "imgGaleria col-sm-6 col-md-4 col-lg-3 col-xl-2";
for (const img of listaRutasGaleria) {
    let galeriaDiv = document.createElement('div');
    let galeriaImg = document.createElement('img');
    galeriaImg.setAttribute('src', img['ruta_imagen']);
    galeriaImg.setAttribute('class', 'img-fluid');
    galeriaDiv.setAttribute('class', clasesDivs);

    divGaleria.appendChild(galeriaDiv);
    galeriaDiv.appendChild(galeriaImg);
}

// let divGaleria = document.getElementById('divGaleria');
// let clasesDivs = "imgGaleria col-sm-6 col-md-4 col-lg-3 col-xl-2 img-fluid";
// for (const img of listaRutasGaleria) {
//     let galeriaImg = document.createElement('img');
//     galeriaImg.setAttribute('src', img['ruta_imagen']);
//     galeriaImg.setAttribute('class', clasesDivs);

//     divGaleria.appendChild(galeriaImg);
// }

//let divSeleccionado;

// function aumentarImg(div) {
//     if (divSeleccionado) {
//         divSeleccionado.setAttribute('class', 'imgGaleria col-sm-6 col-md-4 col-lg-3 col-xl-2');
//     }
//     divSeleccionado = div;
//     divSeleccionado.setAttribute('class', 'col-sm-12 col-md-8 col-lg-6 col-xl-6');
// }

//Función para mostrar la imagen aumentada en un pop up
let divPopUp = document.getElementById('galeriaDivPopUp');
function aumentarImg(div) {
    let img = div.innerHTML;

    if (divPopUp.hasAttribute('style')) {
        divPopUp.removeAttribute('style');
        divPopUp.innerHTML = "";
    }else{
        divPopUp.setAttribute('style', 'display: block;');
        divPopUp.innerHTML = img;
    }
}

//Delegación de eventos para mostrar el pop up o para quitarlo
let galeriaDivMain = document.getElementById('galeriaDivMain');
galeriaDivMain.addEventListener('click', function (event) {
    let target = event.target;

    while (target != this) {
        if (target.tagName == 'DIV') {
            aumentarImg(target);
            return;
        }
        target = target.parentNode;
    }

});