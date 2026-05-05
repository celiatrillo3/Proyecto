console.log(resultadoUsuario);
console.log(resultadoVisto);

let usuarioUser = document.getElementById('usuarioUser');
let usuarioNombre = document.createElement('p');
usuarioNombre.textContent = resultadoUsuario['usuario'];
usuarioUser.after(usuarioNombre);

let usuarioEmail = document.getElementById('usuarioEmail');
let usuarioCorreo = document.createElement('p');
usuarioCorreo.textContent = resultadoUsuario['email'];
usuarioEmail.parentNode.appendChild(usuarioCorreo);

let vistoReciente = document.getElementById('usuarioVistoReciente');
let img = document.createElement('img');
img.setAttribute('src', resultadoVisto['ruta_imagen']);


for (const element of resultadoVisto) {
    let marcaModelo = document.getElementById('usuarioMoto');
    let marcaModeloTexto = element['nombre'] + " " + element['modelo'];
    marcaModelo.textContent = marcaModeloTexto;

    let historia = document.getElementById('usuarioHistoriaP');
    historia.textContent = element['historia'];
}