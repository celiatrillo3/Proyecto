let frases = ['"Clásicos que nunca dejan de rodar."', '"Hierros con encanto."', '"Clásicos que marcaron una época."', '"Cuando la mecánica era arte."', '"El pasado vuelve a arrancar."'];

//Posición en el array
let frase = 0;

//Posición de la letra en la palabra
let letra = 0;
let borrando = false;
let frasesHTML = document.getElementById("indexFrases");

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
