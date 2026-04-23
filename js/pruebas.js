//Submenú dinámico de colección
fetch("json/prueba_nav.json")
    .then((response) => response.json())
    .then((data) => {
        data.marcas.forEach((marca) => {
            let div = document.getElementById("menuDinamico");
            //let li = document.createElement("li");
            let enlaces = document.createElement("a");
            enlaces.setAttribute("href", "coleccion.html");
            enlaces.setAttribute("class", "enlacesDinamicos dropdown-item");
            enlaces.textContent = marca.nombre;
            //li.appendChild(enlaces)
            div.appendChild(enlaces);
        });
    });

fetch("json/prueba_nav.json")
    .then((response) => response.json())
    .then((data) => {
        data.marcas.forEach((marca) => {
            let div = document.getElementById("menuDinamico2");
            //let li = document.createElement("li");
            let enlaces = document.createElement("a");
            enlaces.setAttribute("href", "coleccion.html");
            enlaces.setAttribute("class", "enlacesDinamicos dropdown-item ms-4");
            enlaces.textContent = marca.nombre;
            //li.appendChild(enlaces)
            div.appendChild(enlaces);
        });
    });

//Evento de scroll
// let header = document.getElementById('cabecera');
// function fondoTransparente() {
//     if (window.scrollY > 5) {
//         header.classList.remove('headerTransparente');
//         header.classList.add('headerNoTransparente');
//     }else{
//         header.classList.remove('headerNoTransparente');
//         header.classList.add('headerTransparente');
//     }
// }

// window.addEventListener('scroll', fondoTransparente())


//Frases
let frases = ['"Clásicos que nunca dejan de rodar."', '"Hierros con encanto."', '"Clásicos que marcaron una época."', '"Cuando la mecánica era arte."', '"El pasado vuelve a arrancar."'];

//Posición en el array
let frase = 0;

//Posición de la letra en la palabra
let letra = 0;
let borrando = false;
let frasesHTML = document.getElementById("frases");

function efectoEscritura() {
    let fraseActual = frases[frase];
    let velocidad = 100;

    if (borrando) {
        letra--;
    } else {
        letra++;
    }
    frasesHTML.textContent = fraseActual.substring(0, letra);

    if (borrando) {
        velocidad = 100;
    }

    //Si llega al final de la frase, para unos segudos y luego borra
    if (!borrando && letra == fraseActual.length) {
        velocidad = 2700;
        borrando = true;
        //Sino empieza otra frase
    } else if (borrando && letra == 0) {
        borrando = false;
        frase++;
        //O vuelve a empezar a recorrer el array
        if (frase == frases.length) {
            frase = 0;
        }
    }
    setTimeout(efectoEscritura, velocidad);

}
efectoEscritura();

//BARRA DE BUSQUEDA
document.getElementById('search-button').addEventListener('click', function() {
    var searchBar = document.getElementById('search-bar');
    
    // Alterna la clase active
    searchBar.classList.toggle('active');
    
    // Enfoca la barra de búsqueda para escribir inmediatamente
    if (searchBar.classList.contains('active')) {
        searchBar.focus();
    }
});