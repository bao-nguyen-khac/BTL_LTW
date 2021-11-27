<h3>List products</h3>
<div class="table-contain">
    <table class="admin-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category ID</th>
                <th>Sub Desc</th>
                <th>Main Desc</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php $count = $numpage*$qty - $qty + 1;
        foreach ($products as $product) : ?>
            <tr>
                <td><?= $count ?></td>
                <td><img height="100" width="100" src="./public/img/<?= $product['image'] ?>" alt=""></td>
                <td><?= $product['name'] ?></td>
                <td><?= number_format($product['price']) ?>đ</td>
                <td><?= $product['category_id'] ?></td>
                <td><?= $product['main_desc'] ?></td>
                <td><?= $product['sub_desc']  ?></td>
                <td>
                    <a class="btn btn-primary" href="./AdminController/getProductById/<?= $product['id'] ?>/<?= $numpage ?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php $count++;
        endforeach; ?>
    </table>
    <div class="select-page">
        <?php if ($numpage > 1) : ?>
            <div class="pre-page">
                <a style="text-decoration: none;" href="./AdminController/getAllProducts/<?= $numpage - 1 ?>">
                    << Prev </a>
            </div>
        <?php endif; ?>
        <?php if ($checkNext == 1) : ?>
            <div class="next-page">
                <a style="text-decoration: none;"  href="./AdminController/getAllProducts/<?= $numpage + 1 ?>"> Next >></a>
            </div>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
</div>