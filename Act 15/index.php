<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
session_start(); // Iniciar sesión para poder mostrar mensajes de error
if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger text-center">
        <?= $_SESSION['error_message']; ?>
        <?php unset($_SESSION['error_message']); // Limpia el mensaje después de mostrarlo ?>
    </div>
<?php endif; ?>

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 d-none d-md-block">
            <img src="Lego.png" alt="Logo" class="img-fluid mb-4" style="max-height: 100%; width: auto;">
        </div>
        <div class="col-5 col-md-5 d-flex flex-column align-items-center">
            <img src="Mini.png" alt="Logo" class="img-fluid mb-3" style="max-width: 50px;"> 
            <div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Iniciar Sesión</h4>
                        <form action="Autocontroller.php" method="POST"> <!-- Envío de datos a Autocontroller.php -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="correo" class="form-control" id="email" placeholder="Introduce tu correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="contrasenna" class="form-control" id="password" placeholder="Introduce tu contraseña" required>
                            </div>
                            <input type="hidden" name="action" value="access"> <!-- Acción oculta para identificar login -->
                            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
