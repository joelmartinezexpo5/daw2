<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Product\Models\ProductModel;
use Product\Classes\PDOProduct;
use Product\Classes\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $post_content) {
        if (!validateRequired($post_content)) {
            redirect('index.php?error=1');
        }
    }

    $_POST = sanitizeEntrance($_POST);
    var_dump($_POST);

    $image_product = $_FILES['image'];
    // var_dump($image_product);
    if (!validateUpload($image_product)) {
        redirect('index.php?error=2');
    }

    $image_format = explode('/', $image_product['type'])[1];
    if (!validateFormat($image_format)) {
        redirect('index.php?error=3');
    }

    if (!validateNumeric($_POST['price'])) {
        redirect('index.php?error=4');
    }

    $uploads_dir = 'products';

    if (!file_exists($uploads_dir)) {
        mkdir($uploads_dir);
        move_uploaded_file($image_product['tmp_name'], "{$uploads_dir}/{$image_product['name']}");
    } else {
        move_uploaded_file($image_product['tmp_name'], "{$uploads_dir}/{$image_product['name']}");
    }

    $product = new Product(new PDOProduct());

    $obj_product = new ProductModel();
    $obj_product->setName($_POST['name']);
    $obj_product->setDescription($_POST['description']);
    $obj_product->setPrice($_POST['price']);
    $obj_product->setImage(generateUniqueFileName($image_product['name']));

    if (!$product->create($obj_product)) {
        redirect('index.php?error=5');
    } else {
        redirect('index.php?success=1');
    }
}
