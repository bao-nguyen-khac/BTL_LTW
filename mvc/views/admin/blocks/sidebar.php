<aside class="bd-aside sticky-xl-top text-muted align-self-start mb-3 mb-xl-5 px-2 __sidebar-admin">
    <h2 class="h6 pt-4 pb-3 mb-4 border-bottom">Sidebar</h2>
    <nav class="small" id="toc">
        <ul class="list-unstyled">
            <li class="my-2">
                <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#contents-collapse" aria-controls="contents-collapse">Product Portfolio</button>
                <ul class="list-unstyled ps-3 collapse" id="contents-collapse">
                    <li><a style="text-decoration: none;" class="d-inline-flex align-items-center rounded">Add Product</a></li>
                    <li><a style="text-decoration: none;" class="d-inline-flex align-items-center rounded" href="./AdminController/getAllProducts">List Products</a></li>
                </ul>
            </li>
            <li class="my-2">
                <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#forms-collapse" aria-controls="forms-collapse">Order</button>
                <ul class="list-unstyled ps-3 collapse" id="forms-collapse">
                    <li><a style="text-decoration: none;" class="d-inline-flex align-items-center rounded __list_order_btn" href="./AdminController/ordersList">List Order</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>