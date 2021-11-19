<div class="categories">
    <?php 
    foreach($categories as $category):
    ?>
    <div class="item-category">
        <a href="./Home/viewCategory/<?= $category['id']; ?>"><?= $category['name']; ?></a>
    </div>

    <?php  endforeach;
    ?>
</div>




