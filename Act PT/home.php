<?php
include 'app/ProductController.php';
$ProductController = new ProducController();

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
    $products = $ProductController->products();
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000000;
            color: #ffffff; 
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
        .edit-btn {
            background-color: yellow;
            border: none;
        }
    </style>
</head>
<body>
    <div class=""> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 p-0 m-0 d-none d-md-block">
                    <div class="d-flex flex-column min-vh-100 flex-shrink-0 p-3 text-white bg-dark">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-4">Tienda Virtual</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page">Inicio</a>
                                <a href="#" class="nav-link text-white">Panel de control</a>
                                <a href="#" class="nav-link text-white">Pedidos</a>
                                <a href="#" class="nav-link text-white">Productos</a>
                                <a href="#" class="nav-link text-white">Clientes</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>Admin</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col p-0 m-0">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
                        <div class="container">
                            <a class="navbar-brand" href="#">Tienda online</a>
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
                                        <a class="nav-link" href="#">Precio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" aria-disabled="true">Deshabilitado</a>
                                    </li>
                                </ul>
                            </div>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success me-3" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <div id="main">
                        <div class="container p-3"> 
                            <div class="row"> 
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                        <div class="card m-1" style="width: 18rem;" id="product-<?= htmlspecialchars($product['id']) ?>">
                                            <img src="<?= htmlspecialchars($product['cover']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                                                <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                                                <a href="details.php?slug=<?= htmlspecialchars($product['slug']) ?>" class="btn btn-primary">Detalles</a>
                                                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop2" class="btn btn-primary edit-btn" data-slug="<?= htmlspecialchars($product['slug']) ?>">Editar</a>
                                                <button onclick="remove(<?= $product['id'] ?>)" class="btn btn-danger">Eliminar</button>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No hay más productos.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="app/ProductController.php" method="POST">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="edit_slug" name="slug" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="edit_description" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_features" class="form-label">Características</label>
                            <input type="text" class="form-control" id="edit_features" name="features" required>
                        </div>
                        <input type="hidden" id="edit_id" name="id" />
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                        <input type="hidden" name="action" value="edit_product" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        function remove(productId) {
            if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                fetch('app/ProductController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        id: productId,
                        action: 'delete_product',
                    }),
                })
                .then(response => {
                    if (response.ok) {
                        document.getElementById('product-' + productId).remove(); 
                    } else {
                        alert('Error al eliminar el producto.'); 
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
        
       
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                const slug = button.getAttribute('data-slug');
                const productCard = button.closest('.card');
                document.getElementById('edit_id').value = productCard.id.split('-')[1];
                document.getElementById('edit_name').value = productCard.querySelector('.card-title').textContent;
                document.getElementById('edit_slug').value = slug;
                document.getElementById('edit_description').value = productCard.querySelector('.card-text').textContent;
                document.getElementById('edit_features').value = 'Escribe tus características aquí'; 
            });
        });
    </script>
</body>
</html>
