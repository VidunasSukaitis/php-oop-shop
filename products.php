<?php

require_once('./classes/Product.php');

// TODO: add products list page
$products = Product::getProducts('./data/products.json');

?>

<html>
  <head>
    <title>
      Products list
    </title>
  </head>
   

<div>
<?php foreach ($products as $product) : ?>
    <div>
        <h3>
            <?php echo $product->title; ?>
        </h3>
        <span>
            <?php echo $product->price; ?> Eur
        </span>
        <div>
            <?php foreach ($product->images as $image) : ?>
                <img src="<?php echo $image ?>">
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
  


  
  <body>
  </body>
</html>
