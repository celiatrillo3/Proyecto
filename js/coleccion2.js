//Carrusel de las imagenes de la moto

// listaRutas = JSON.stringify(listaRutas);
// listaRutas = JSON.parse(listaRutas);
let coleccion2Img = document.getElementById('coleccion2Img');
let posicion;
if (localStorage.getItem("posicion") == null) {
    posicion = 0;
    localStorage.setItem("posicion", posicion);
} else {
    posicion = localStorage.getItem("posicion");
}
coleccion2Img.setAttribute('src', listaRutas[posicion]['ruta_imagen']);


function cambiarImagenConEfecto(nuevaPosicion) {
    let imgElement = document.getElementById('coleccion2Img');
    let rutaNueva = listaRutas[nuevaPosicion]['ruta_imagen'];
    imgElement.style.opacity = "1";
    let imagenFantasma = new Image();
    imagenFantasma.src = rutaNueva;

    imagenFantasma.onload = function () {
        imgElement.style.opacity = "0";

        setTimeout(() => {
            imgElement.src = rutaNueva;
            imgElement.style.opacity = "1";
            posicion = nuevaPosicion;
            localStorage.setItem("posicion", posicion);
        }, 150);
    }
}


function imgAtras() {
    let pos = parseInt(localStorage.getItem("posicion") || 0);
    let nueva = (pos <= 0) ? listaRutas.length - 1 : pos - 1;
    cambiarImagenConEfecto(nueva);
}

function imgAlante() {
    let pos = parseInt(localStorage.getItem("posicion") || 0);
    let nueva = (pos >= listaRutas.length - 1) ? 0 : pos + 1;
    cambiarImagenConEfecto(nueva);
}

//Mostar infomación de la moto
for (const element of listaMotos) {
    let marcaModelo = document.getElementById('coleccion2MarcaModelo');
    let marcaModeloTexto = element['nombre'] + " " + element['modelo'];
    marcaModelo.textContent = marcaModeloTexto;

    let año = document.getElementById('coleccion2Año');
    año.textContent = element['año'];

    let color = document.getElementById('coleccion2Color');
    color.textContent = element['color'];

    let tipo = document.getElementById('coleccion2Tipo');
    tipo.textContent = element['tipo'];

    let origen = document.getElementById('coleccion2Origen');
    origen.textContent = element['nombre_pais'];

    let historia = document.getElementById('coleccion2HistoriaP');
    historia.textContent = element['historia'];
}


//Evento para pintar y despintar las estrellas

function pintarEstrella(estrella) {
    if (estrella.getAttribute('class') == "fi fi-rs-star estrella") {
        while (estrella.previousElementSibling != null) {
            estrella.setAttribute('class', 'fi fi-ss-star estrella');
            estrella = estrella.previousElementSibling;
        }
        estrella.setAttribute('class', 'clase fi fi-ss-star estrella');
    } else {
        while (estrella.nextElementSibling != null) {
            estrella.setAttribute('class', 'fi fi-rs-star estrella');
            estrella = estrella.nextElementSibling;
        }
        estrella.setAttribute('class', 'fi fi-rs-star estrella');
    }

}

//Delegación de eventos para pintar las estrellas 

let divIconosEstrella = document.getElementById('coleccion2DivIconosEstrella');
divIconosEstrella.addEventListener('click', function (event) {
    let target = event.target;

    while (target != this) {
        if (target.tagName == 'I') {
            let valor = parseInt(target.getAttribute('data-valor'));
            document.getElementById('puntuacion').value = valor;
            pintarEstrella(target);
            return;
        }
        target = target.siblingNode;
    }
});

    //Escribir comentarios de la base de datos
for (const comentario of listaComentarios) {

    let divComentarios= document.getElementById('coleccion2Comentarios');

    let div = document.createElement('div');
    div.setAttribute('class', 'coleccion2CajaComentario');

    let div2 = document.createElement('div');

    let p = document.createElement('p');
    p.textContent = comentario['texto'];

    let div3 = document.createElement('div');
    div3.setAttribute('class', 'comentarioUsuario');

    let p2 = document.createElement('p');
    p2.textContent = comentario['fecha'];

    let i = document.createElement('i');
    i.setAttribute('class', 'fi fi-rs-circle-user');

    let p3 = document.createElement('p');
    p3.textContent = comentario['usuario'];

    let div4 = document.createElement('div');
    div4.setAttribute('class', 'coleccion2DivIconosEstrellaComentarios');

    //Pintar la estrellas de la base de datos
    let puntuacion = comentario['puntuacion']
    for (let j = 0; j < 5; j++) {
        let estrella = document.createElement('i');
        if (puntuacion > 0) {
            estrella.setAttribute('class', 'fi fi-ss-star iconoEstrella');
            puntuacion--;
        } else {
            estrella.setAttribute('class', 'fi fi-rs-star iconoEstrella');
        }
        div4.appendChild(estrella);
    }

    div3.appendChild(i);
    div3.appendChild(p3);
    div3.appendChild(div4);

    div2.appendChild(div3);
    div2.appendChild(p2);

    div.appendChild(div2);
    div.appendChild(p);

    divComentarios.appendChild(div);
}

function favoritos() {
    let idMoto;
    for (const element of listaMotos) {
        idMoto = element['id_moto'];
    }
    
    fetch("añadirFavoritos.php", {
        method: "POST",
        credentials: "include",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ id_moto: idMoto })
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => {
        console.error("Error en fetch:", error);
    });

}
let botonFavoritos = document.getElementById('botonFavoritos');
botonFavoritos.addEventListener('click', favoritos);
