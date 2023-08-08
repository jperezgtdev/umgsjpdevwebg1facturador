<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulario de Registro</title>
</head>
<body>

<!-- Botón para desplegar la barra lateral -->
<button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    Opciones
</button>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-primary">
        <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Opciones</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-light">
        <div class="text-center">
            <p>Opciones.</p>
        </div>
    </div>
</div>

<div class="container">
    <h1>Formulario de Registro</h1>
    
    <br><br>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ingresar_registro.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" required autocomplete="usuario">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="rol" id="rol" required>
                                <option value="administrador">Administrador</option>
                                <option value="operador">Operador</option>
                                <option value="IT">IT</option>
                            </select>
                        </div>
            
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" type="submit" value="Registrarme">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <div id="tabla-container">
        <table class="table table-hover table-bordered table-striped" id="tabla">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>jerber</td>
                    <td>jcintor@miumg.edu.gt</td>
                    <td>1234</td>
                    <td>Jerber</td>
                    <td>36596188</td>
                    <td><button class="btn btn-primary btn-sm">Editar</button></td>
                    <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                </tr>
                <!-- Puedes agregar más filas aquí con datos de la tabla -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>
</body>
</html>
