<?php
include_once "app/ProductController.php";
$productController = new ProducController(); 

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
    $products = $productController->get();
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            transition: transform 0.2s;
            border-radius: 10px;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .dropdown-menu {
            border-radius: 10px;
        }
        .sidebar {
            background-color: #343a40;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column" style="width: 250px;">
            <a class="navbar-brand" href="#">Tienda Virtual</a>
            <hr class="bg-light">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Inicio</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Panel de Control</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Mis Pedidos</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Productos</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Clientes</a>
                </li>
            </ul>
            <hr class="bg-light">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Mi Cuenta</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Nuevo Proyecto</a></li>
                    <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>

        <div class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Tienda Online</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Características</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Deshabilitado</a>
                        </li>
                    </ul>
                </div>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Buscar productos" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </nav>

            <div class="container my-4">
                <h2 class="mb-4 text-center">Productos Disponibles</h2>
                <div class="row">
                    <?php if (isset($products) && count($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <img src="<?= $product->cover ?>" class="card-img-top" alt="<?= $product->name ?>" style="border-radius: 10px 10px 0 0;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $product->name ?></h5>
                                        <p class="card-text"><?= $product->description ?></p>
                                        <a href="details.php?slug=<?= $product->slug ?>" class="btn btn-primary">Detalles</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                Actualmente no hay productos disponibles.
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
