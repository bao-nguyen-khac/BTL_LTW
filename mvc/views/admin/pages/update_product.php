<div class="container p-2">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center">Update Product</h5>
        </div>
        <div class="card-body">
            <form action="./AdminController/updateProduct/<?= $product['id'] ?>" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text">Product Name</span>
                    <input type="text" class="form-control" autocomplete="off" name="name" value="<?= $product['name'] ?>"/>
                </div>
                <!--Phần hỏi + đáp án-->
                <div class="input-group mb-3">
                    <span class="input-group-text">Price</span>
                    <input type="text" class="form-control" autocomplete="off" name="price" value="<?= $product['price'] ?>"/>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Sub Desc</span>
                    <textarea class="form-control" autocomplete="off" name="main_desc"><?= $product['main_desc'] ?></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Main Desc</span>
                    <textarea class="form-control" autocomplete="off" name="sub_desc"><?= $product['sub_desc'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit-update">Update</button>
            </form>
        </div>
    </div>
</div>
