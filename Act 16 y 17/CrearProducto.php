<?php
include_once "app/ProductController.php";
$productController = new ProducController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];

    header('Location: home.php'); 
    exit();
}
?>
