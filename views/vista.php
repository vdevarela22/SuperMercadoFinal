<?php
$product_id = $_GET['id'];
$product = array(
    'name' => 'Producto de ejemplo',
    'code' => 'P-001',
    'description' => 'Este es un producto de ejemplo',
    'price' => 19.99,
    'quantity' => 10,
    'image' => '/dist/images/producto.png'
);
?>

<div class="product-details">
  <h1><?php echo $product['name']; ?></h1>
  <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
  <p>Código: <?php echo $product['code']; ?></p>
  <p><?php echo $product['description']; ?></p>
  <p>Precio: $<?php echo $product['price']; ?></p>
  <p>Stock disponible: <?php echo $product['quantity']; ?></p>
</div>


<link href="../dist/css/vista.css" rel="stylesheet" >