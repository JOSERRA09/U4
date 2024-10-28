<!DOCTYPE html>   
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceder a la Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 3200px; 
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="login-container d-flex align-items-center"> 
                <div class="col-md-6 d-none d-md-block">
                    <img src="Spider.png" class="img-fluid rounded-start" alt="Spider" style="max-height: 400px; object-fit: cover;">
                </div>
                
                <div class="col p-4">
                    <div class="login-header">
                        <img src="Lego.png" class="img-thumbnail mb-4" alt="Logo">
                        <h2>Acceder a la Cuenta</h2>
                    </div>
                    
                    <form method="POST" action="app/AuthController.php">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasenna" required>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="mantenerSesion" name="mantener_sesion">
                            <label class="form-check-label" for="mantenerSesion">Mantener sesión abierta</label>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>

                        <input type="hidden" name="action" value="access">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
