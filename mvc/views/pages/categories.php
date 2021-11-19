<?php foreach($categories as $category){
    if($category['id'] == $id){
        echo "<div class=\"title row\">
                <div class=\"col l-12\">
                     ${category['name']}
                 </div>
             </div>";
    }
}?>
<div class="products row">
<?php foreach($products as $product):?>
    <div class="item-product col l-4">
        <a class="img-product" href="./Home/viewDetailProductById/<?=$product['id']?>"><img src="./public/img/<?= $product['image'] ?>.jfif" alt="Anh san pham"></a>
        <div class='name'>Product: <?= $product['name']; ?></div>
        <div class="price">Price:<?= $product['price']; ?> VND</div>
        <a href="./Cart/addToCart/<?= $product['id'] ?>" class="add-to-cart">Add to cart</a>
    </div>
<?php  endforeach;?>
</div>     
