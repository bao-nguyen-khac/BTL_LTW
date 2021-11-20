<div class="rightsidebar span_3_of_1">
    <h2>CATEGORIES</h2>
    <ul style="font-size:25px">
        <?php
        foreach ($categories as $category) :
        ?>
            <li><a href="./HomeController/viewCategory/<?= $category['id']; ?>"><?= $category['name']; ?></a></li>
        <?php endforeach;
        ?>
    </ul>
</div>
