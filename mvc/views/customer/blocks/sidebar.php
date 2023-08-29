<div class="rightsidebar span_3_of_1">
    <h2>CATEGORIES</h2>
    <ul style="font-size:25px">
        <?php
        foreach ($categories as $category) :
        ?>
            <li><a href="./HomeController/viewCategory/<?= $category['id']; ?>"><?= $category['ten']; ?></a></li>
        <?php endforeach;
        ?>
    </ul>
    <div>
        <img class="__banner_sale" src="./public/img/banner-sale.jfif" alt="banner">
        <img class="__banner_sale" src="./public/img/banner-sale2.jfif" alt="banner">
    </div>
</div>
