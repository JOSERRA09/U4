
<?php  
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tienda Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-sidebar p-3 d-none d-md-block">
                <h5>Categorías</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Todos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tecnología</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Moda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hogar</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h5>Productos</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Añadir</button>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    <div class="col">
                        <div class="card">
                            <img src="Tn.png" class="card-img-top" alt="Usuario A">
                            <div class="card-body">
                                <h5 class="card-title">Tennis Jordan</h5>
                                <p><strong>Descripción:</strong> Tennis Jordan Edicion</p>
                                <p><strong>Precio:</strong> $49.99 USD</p>
                                <p><strong>Detalles:</strong> Los Tennis Jordan son la esencia del baloncesto y la cultura urbana. Lanzados por primera vez en 1985, estos tenis han trascendido generaciones, convirtiéndose en un símbolo de rendimiento tanto en la cancha como en la vida cotidiana.</p>
                                <a href="#" class="btn btn-primary">Añadir al carrito</a>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal">Editar</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Añadir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="addUserEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="addUserEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="addUserPassword" class="form-label">Contraseña</label>
                            <textarea class="form-control" id="addUserPassword" name="password" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveNewUser">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <div class="mb-3">
                            <label for="editUserEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="editUserEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUserPassword" class="form-label">Contraseña</label>
                            <textarea class="form-control" id="editUserPassword" name="password" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveUserChanges">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Eliminar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmUserDelete">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .navbar {
            background-color: #555353;
        }
        .navbar .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff;
        }
        .navbar .nav-link:hover {
            color: #2c2929;
        }
        .bg-sidebar {
            background-color: #463c3c7c;
            height: 100vh;
            background: linear-gradient(to right, #2c2b2b, #463c3c7c);
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.4);
        }
        .card {
            border-color: #007bff;
        }
        .card-title {
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .nav-link {
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            background-color: #6c757d;
            color: #ffffff;
            border-radius: 5px;
        }
        .nav-link.active {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybK62lKoDgF/aHcA6LVc8pF7v2sM2bZw8Cw1pVtOWFmEx6E9Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-5dYq51k9A7v5uB9H0HddgC1p47skMTmIsrI5Gxnv0H1gU5r8vS1mlGp5sIZgYdr8" crossorigin="anonymous"></script>
</body>
</html>

