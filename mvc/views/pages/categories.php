<div class="cont-desc span_1_of_2">
    <div class="content_top">
        <div class="heading">
            <h3><?php foreach ($categories as $category) {
                if ($category['id'] == $id) {
                    echo $category['name'];
                }
            } ?></h3>
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
            <p>Result Pages:
            <ul>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li>[<a href="#"> Next>>></a>]</li>
            </ul>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <?php $count = -1;
    $temp = 0;
    foreach ($products as $product) :
        $count++;
        if ($count % 4 == 0) : $temp = $count; ?>
            <div class="section group">
            <?php endif; ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="#"><img src="./public/img/<?= $product['image'] ?>" alt="" /></a>
                <h2><?= $product['name'] ?></h2>
                <p><span class="price"><?= $product['price'] ?>đ</span></p>
                <div class="button"><span><img src="./public/img/cart.jpg" alt="" /><a href="#" class="cart-button">Add to Cart</a></span> </div>
            </div>
            <?php if ($count == $temp + 3) : ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</div>