<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button class="siguienteTurno">Boton</button>
    <button class="siguienteTurno">Boton</button>
    <button class="siguienteTurno">Boton</button>
    <button class="siguienteTurno">Boton</button>
    <button>Boton2</button>
    <button>Boton2</button>

    <script>
        let update = false;
        document.addEventListener('click', function(event) {
            let target = event.target;
            if (target.getAttribute('class') == "siguienteTurno") {
                console.log("Cambio de turno");
                update = true;
            } else {
                console.log("No cambio de turno");
                update = false
            }


            fetch("loQueQuieras.php", {
                    method: "POST",
                    credentials: "include",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({update: update})
                })
                .then(response => response.text())
                .then(data => console.log(data))
                .catch(error => {
                    console.error("Error en fetch:", error);
                });
        });
    </script>

    <!-- loQueQuieras.php -->
    <?php
    $json = file_get_contents('php://input');

    //Convertir de json a php
    $data = json_decode($json, true);
    error_log($json);
    //Se asegura de que si el valor es null, asigne null a la variable y no de error
    $update = $data['update'] ?? null;
    ?>
</body>

</html>