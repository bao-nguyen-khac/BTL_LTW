<div class="cont-desc span_1_of_2">
    <div class="content_top">
        <div class="heading">
            <h3>New Products</h3>
        </div>
        <div class="page-no">

        </div>
        <div class="clear"></div>
    </div>
    <div class="list-products">
    <?php $count = -1;
    foreach ($products as $product) :
        $count++;
        if ($count % 4 == 0) :?>
            <div class="section group">
        <?php endif; ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="./HomeController/viewDetailProductById/<?= $product['id'] ?>"><img class="__img_prod" src="./public/img/<?= $product['image'] ?>" alt="" /></a>
                    <h2 class="__title_prod"><?= $product['name'] ?></h2>
                    <p><span class="price"><?= number_format($product['price']) ?>đ</span></p>
                    <div class="button"><span><img src="./public/img/cart.jpg" alt="" /><a href="./CartController/addToCart/<?= $product['id'] ?>" class="cart-button">Add to Cart</a></span> </div>
                </div>
        <?php if ($count % 4 == 3 ) : ?>
            </div>
        <?php endif; ?>
    <?php endforeach; 
        if($count % 4 != 3 ){
            echo '</div>';
        }
    ?>
    </div>
    <div class="select-page">
        <?php if ($page > 1) : ?>
            <div class="pre-page">
                <a href="./HomeController/newProducts/<?= $page - 1 ?>">
                    << Prev </a>
            </div>
        <?php endif; ?>
        <?php if ($checkNext == 1) : ?>
            <div class="next-page">
                <a href="./HomeController/newProducts/<?= $page + 1 ?>"> Next >></a>
            </div>
        <?php endif; ?>

        <div class="clear"></div>
    </div>

</div>