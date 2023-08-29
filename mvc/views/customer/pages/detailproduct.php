<div class="cont-desc span_1_of_2">
    <div class="grid images_3_of_2">
        <img src="./public/img/<?= $product['anh'] ?>" alt="" />
    </div>
    <div class="desc span_3_of_2">
        <h2><?= $product['ten']; ?></h2>
        <p><?= $product['mota_chinh'] ?></p>
        <div class="price">
            <p>Price: <span><?= number_format($product['gia']); ?>đ</span></p>
        </div>
        <div class="share">
            <p>Share Product :</p>
            <ul>
                <li><a><img src="./public/img/youtube.png" alt=""></a></li>
                <li><a><img src="./public/img/facebook.png" alt=""></a></li>
                <li><a><img src="./public/img/twitter.png" alt=""></a></li>
                <li><a><img src="./public/img/linkedin.png" alt=""></a></li>
            </ul>
        </div>
        <div class="add-cart">
            <div class="rating">
                <p>Rating:<img src="./public/img/rating.png"><span>[3 of 5 Stars]</span></p>
            </div>
            <div class="button"><span><a href="./CartController/addToCart/<?= $product['id'] ?>">Add to Cart</a></span></div>
            <div class="clear"></div>
        </div> 
    </div>
    <div class="product-desc">
        <h2>Product Details</h2>
        <?php foreach(explode("/",$product['mota_phu']) as $each): ?>
            <p><?=$each ?></p>
        <?php endforeach;?>
    </div>
    <div class="product-tags">
        <h2>Product Tags</h2>
        <h4>Add Your Tags:</h4>
        <div class="input-box">
            <input type="text" value="" />
        </div>
        <div class="button"><span><a href="#">Add Tags</a></span></div>
    </div>
</div>