//Añadir nombre de usuario y email
let usuarioUser = document.getElementById('usuarioUser');
let usuarioNombre = document.createElement('p');
usuarioNombre.textContent = resultadoUsuario[0]['usuario'];
usuarioUser.after(usuarioNombre);

let usuarioEmail = document.getElementById('usuarioEmail');
let usuarioCorreo = document.createElement('p');
usuarioCorreo.textContent = resultadoUsuario[0]['email'];
usuarioEmail.parentNode.appendChild(usuarioCorreo);


//Añadir última moto vista
let vistoReciente = document.getElementById('usuarioVistoReciente');
let div = document.createElement('div');
div.setAttribute('class', 'col-sm-10 col-md-8 col-lg-6 me-4 mb-4');
let img = document.createElement('img');
img.setAttribute('src', resultadoVisto[0]['ruta_imagen']);
img.setAttribute('class', 'img-fluid');
console.log(resultadoVisto[0]['ruta_imagen']);
div.appendChild(img);
vistoReciente.appendChild(div);


let div2 = document.createElement('div');
div2.setAttribute('class', 'col-sm-10 col-md-8 col-lg-5 mb-4 d-flex flex-column align-items-start');
div2.setAttribute('id','usuarioContenedorInfoVistoReciente');


let h2 = document.createElement('h2');
h2.setAttribute('id', 'usuarioMoto');
let h2Texto = resultadoVisto[0]['nombre'] + " " + resultadoVisto[0]['modelo'];
h2.textContent = h2Texto;

let div3 = document.createElement('div');
div3.setAttribute('id', 'usuarioHistoriaMoto');

let a = document.createElement('a');
let idMoto = resultadoVisto[0]['id_moto'];
idMoto = 'coleccion2.php?moto=' + idMoto;
a.setAttribute('href', idMoto);

let i = document.createElement('i');
i.setAttribute('class', 'fas fa-quote-left me-2');

let p = document.createElement('p');
p.setAttribute('id', 'usuarioHistoriaP');
p.textContent = resultadoVisto[0]['historia'];

let button = document.createElement('button');
button.setAttribute('type', 'submit');
button.setAttribute('class', 'enlacesIconos botonesIconos visto  align-self-end');
button.textContent = "VER MÁS";

div3.appendChild(i);
div3.appendChild(p);

a.appendChild(button);

div2.appendChild(h2);
div2.appendChild(div3);
div2.appendChild(a);

vistoReciente.appendChild(div2);


//Añadir últimos comentarios

for (const comentario of resultadoComentarios) {

    let divComentarios= document.getElementById('usuarioComentarioReciente');

    let a = document.createElement('a');
    let idMotoComentario = comentario['moto_id'];
    idMotoComentario = 'coleccion2.php?moto=' + idMotoComentario;
    a.setAttribute('href', idMotoComentario);

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

    a.appendChild(div);

    divComentarios.appendChild(a);
}