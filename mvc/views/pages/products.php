<div class="cont-desc span_1_of_2">
    <div class="content_top">
        <div class="heading">
            <h3>Feature Products</h3>
        </div>
        <!-- <div class="sort">
            <p>Sort by:
                <select>
                    <option>Lowest Price</option>
                    <option>Highest Price</option>
                    <option>Lowest Price</option>
                    <option>Lowest Price</option>
                    <option>Lowest Price</option>
                    <option>In Stock</option>
                </select>
            </p>
        </div>
        <div class="show">
            <p>Show:
                <select>
                    <option>4</option>
                    <option>8</option>
                    <option>12</option>
                    <option>16</option>
                    <option>20</option>
                    <option>In Stock</option>
                </select>
            </p>
        </div> -->
        <div class="page-no">
            <a href="#"><p>See All Products >>></p></a>
        </div>
        <div class="clear"></div>
    </div>
    <?php $count = -1;
    $temp = 0;
    foreach ($feature_products as $product) :
        $count++;
        if ($count % 4 == 0) : $temp = $count; ?>
            <div class="section group">
            <?php endif; ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="./HomeController/viewDetailProductById/<?=$product['id']?>"><img class="__img_prod" src="./public/img/<?= $product['image'] ?>" alt="" /></a>
                <h2 class="__title_prod"><?= $product['name'] ?></h2>
                <p><span class="price"><?= number_format($product['price'])  ?>đ</span></p>
                <div class="button"><span><img src="./public/img/cart.jpg" alt="" /><a href="./CartController/addToCart/<?= $product['id'] ?>" class="cart-button">Add to Cart</a></span> </div>
            </div>
            <?php if ($count == $temp + 3) : ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="content_bottom">
        <div class="heading">
            <h3>New Products</h3>
        </div>
        <div class="page-no">
            <a href="#"><p>See All Products >>></p></a>
        </div>
        <div class="clear"></div>
    </div>
    <?php $count = -1;
    $temp = 0;
    foreach ($new_products as $product) :
        $count++;
        if ($count % 4 == 0) : $temp = $count; ?>
            <div class="section group">
            <?php endif; ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="./HomeController/viewDetailProductById/<?=$product['id']?>"><img class="__img_prod" src="./public/img/<?= $product['image'] ?>" alt="" /></a>
                <h2 class="__title_prod"><?= $product['name'] ?></h2>
                <p><span class="price"><?= number_format($product['price']) ?>đ</span></p>
                <div class="button"><span><img src="./public/img/cart.jpg" alt="" /><a href="./CartController/addToCart/<?= $product['id'] ?>" class="cart-button">Add to Cart</a></span> </div>
            </div>
            <?php if ($count == $temp + 3) : ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>




        