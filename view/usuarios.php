<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="../public/css/usuarios.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/c0c9ac72d8.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- p-3 agrega espacio alrededor del título de tamaño 3 en los cuatro lados -->
    <h1 class="text-center p-3">CRUD, Aplicación para crear, leer, actualizar y eliminar usuarios</h1>

    <!-- crea un contenedor principal ocupando 100% del ancho -->
    <div class="container-fluid">
        <!-- Crea una fila flexible -->
        <div class="row">

            <!-- Sección del formulario -->
            <!-- Diseño del formulario, documentación de bootstrap -->
            <!-- col-4 indica que el formulario ocupará 4 columnas de un total de 12, p-3 agrega espacio alrededor del formulario -->

            <form class="col-4 p-3" method="POST" action=""> <!-- Pendiente el metodo de envio -->
                <h3 class="text-center text-success">Registro de personas</h3>

                <!-- m= margin, b= dirección de abajo, 3= tamaño del margen -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombreHelp" required>
                </div>
                <div class="mb-3">
                    <label for="gmail" class="form-label">Gmail</label>
                    <input type="email" class="form-control" name="gmail" id="gmail" aria-describedby="gmailHelp" required>
                    <div id="gmailHelp" class="form-text">No compartiremos tu correo con nadie más.</div>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select class="form-select" name="genero" id="genero" required>
                        <option value="">Elija el género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" aria-describedby="fechaNacimientoHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
            </form>

            <!-- Sección de la tabla -->
            <!-- col-8 indica que el formulario ocupará 8 columnas de un total de 12, p-4 agrega espacio alrededor del formulario -->
            <div class="col-8 p-4">
                <div class="table-responsive"> <!-- table-responsive permite que la tabla se vea bien en dispositivos móviles -->
                    <table class="table table-striped table-hover"> <!-- Aplica estilo de cebra y iluminacion al pasar el cusor por encima -->
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Gmail</th>
                                <th scope="col">Género</th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/database.php"; // Incluye el archivo de configuración de la base de datos
                            $sql = $conexion->query("SELECT * FROM usuarios"); // Realiza una consulta SQL para obtener todos los usuarios

                            // Itera sobre los resultados de la consulta y genera una fila de tabla para cada usuario
                            // fetch_object() obtiene la siguiente fila de resultados como un objeto
                            // En cada vuelta del ciclo, saca una fila de $sql usando fetch_object() y la guarda como objeto en $datos
                            while ($datos = $sql->fetch_object()) { ?>

                                <tr>
                                    <th><?php echo $datos->id ?></th>
                                    <td><?php echo $datos->nombre ?></td>
                                    <td><?php echo $datos->genero ?></td>
                                    <td><?php echo $datos->fecha_nacimiento ?></td>
                                    <td><?php echo $datos->password ?></td>
                                    <td>
                                        <!-- btn clase obligatoria para convertir button, a o input en boton -->
                                        <!-- btn-sm reduce el tamaño del botón a pequeño -->
                                        <!-- btn-danger aplica el estilo de botón peligroso -->
                                        <a href="" class="btn btn-sm btn-warning"
                                            title="Editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="" class="btn btn-sm btn-danger"
                                            title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>