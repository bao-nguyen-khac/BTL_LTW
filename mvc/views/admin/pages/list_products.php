<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./public/js/main_admin.js"></script>
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
        <?php $count = $numpage * $qty - $qty + 1;
        foreach ($products as $product) : ?>
            <tr>
                <td><?= $count ?></td>
                <td><img height="100" width="100" src="./public/img/<?= $product['anh'] ?>" alt=""></td>
                <td><?= $product['ten'] ?></td>
                <td><?= number_format($product['gia']) ?>đ</td>
                <td><?= $product['theloai_id'] ?></td>
                <td><?= $product['mota_chinh'] ?></td>
                <td><?= $product['mota_phu']  ?></td>
                <td>
                    <a class="btn btn-primary" href="./AdminController/getProductById/<?= $product['id'] ?>/<?= $numpage ?>">Edit</a>
                </td>
                <td>
                    <button class="btn btn-danger btn-del-product" data-id-product="<?= $product['id'] ?>" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete</button>
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
                <a style="text-decoration: none;" href="./AdminController/getAllProducts/<?= $numpage + 1 ?>"> Next >></a>
            </div>
        <?php endif; ?>
        <div class="clear"></div>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="admin-delete-product"><button type="button" class="btn btn-primary">Delete</button></a>
            </div>
        </div>
    </div>
</div>