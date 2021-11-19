<?php
    // echo '<pre>';
    // print_r($products);
    // die;
?>
<div class="title row">
    <div class="col l-12">
        Detail Product
    </div>
</div>
<div class="product row">
<?php //foreach($products as $product):?>
<div class="item-product col l-4">
    <a class="img-product" href="./Home/viewDetailProductById/<?=$products['id']?>"><img src="./public/img/<?= $products['image'] ?>.jfif" alt="Anh san pham"></a>
    <div class='name'>Product: <?= $products['name']; ?></div>
    <div class="price">Price:<?= $products['price']; ?> VND</div>
    <a href="./Cart/addToCart/<?= $products['id'] ?>" class="add-to-cart">Add to cart</a>
</div>
<?php // endforeach;?>
</div>