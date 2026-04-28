let usuarioUser = document.getElementById('usuarioUser');
let usuarioNombre = document.createElement('p');
usuarioNombre.textContent = resultadoUsuario[0]['usuario'];
usuarioUser.after(usuarioNombre);

let usuarioEmail = document.getElementById('usuarioEmail');
let usuarioCorreo = document.createElement('p');
usuarioCorreo.textContent = resultadoUsuario[0]['email'];
usuarioEmail.parentNode.appendChild(usuarioCorreo);
console.log(resultadoUsuario[0]['email']);