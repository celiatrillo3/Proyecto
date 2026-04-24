let listaMotos = JSON.stringify(listaMotosJson);
listaMotos = JSON.parse(listaMotos);
console.log(listaMotos);
let contedorImgsColeccion = document.getElementById('contenedorImgsColeccion');
for (const element of listaMotos) {
    //DIV1
    let div1 = document.createElement('a');
    div1.setAttribute('class', 'col-sm-12 col-md-6 col-lg-4');
    let id = element['id_moto'];
    id = 'coleccion2.php?moto=' + id;
    // id = 'pruebaCatalogo2.php?moto=' + id;
    div1.setAttribute('href', id);

    //DIV2
    let div2 = document.createElement('div');
    div2.setAttribute('class', 'coleccionImagenMoto');

    //IMG
    let img = document.createElement('img');
    img.setAttribute('src', element['ruta_imagen']);
    img.setAttribute('class', 'img-fluid');

    //DIV3
    let div3 = document.createElement('div');
    div3.setAttribute('class', 'coleccionInformacionMoto ps-4 pb-4 d-flex justify-content-between');

    //DIV4
    let div4 = document.createElement('div');
    let h5 = document.createElement('h5');
    h5.textContent = element['nombre'] + " " + element['modelo'];

    //DIV5
    let div5 = document.createElement('div');
    div5.setAttribute('class', 'coleccionTexto d-flex flex-row');

    //P1
    let p1 = document.createElement('p');
    p1.setAttribute('class', 'coleccionTextoFecha');
    p1.textContent = element['año'];

    //P2
    let p2 = document.createElement('p');
    p2.textContent = ' • ';

    //P3
    let p3 = document.createElement('p');
    p3.setAttribute('class', 'coleccionTextoPais');
    p3.textContent = element['nombre_pais'];



    //AppendChilds

    div5.appendChild(p1);
    div5.appendChild(p2);
    div5.appendChild(p3);

    div4.appendChild(h5);
    div4.appendChild(div5);

    div3.appendChild(div4);


    div2.appendChild(img);
    div2.appendChild(div3);

    div1.appendChild(div2);

    contedorImgsColeccion.appendChild(div1);
}

