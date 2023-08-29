<?php
    $output = '
        <h3>List orders</h3>
        <div class="table-contain" >
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Time</th>
                    <th>Products</th>
                    <th>Total Price</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Hide</th>
                </tr>
            </thead>';
    $count = 1;
    foreach ($order_detail as $order) {
        $status = '';
        if($order['trangthai'] == 0){
            $status = 'Pending';
        }else if($order['trangthai'] == 1){
            $status = 'Shiping...';
        }else{
            $status = 'Done';
        }
        $output .= '
            <tr>
                <td> '.$order['donhang_id'].' </td>
                <td> '.$order['ngay_dat'].' </td>
                <td>';
        foreach ($order['products'] as $product) {
            $output .= $product['tensanpham'] .' x '.$product['soluong'].'<br>';
        }
        $output .= '</td>
                <td> '.number_format($order['gia']) .'đ</td>
                
                <td><a class="view-detail-cus" href="./AdminController/viewCustomer/'.$order['nguoidung_id'] .'">Details</a></td>
                <td><button type="button" class="btn btn-primary __btn-status" data-order_id="'.$order['donhang_id'].'" data-status="'.$order['status'].'" data-bs-toggle="modal" data-bs-target="#modalAction">'.$status.'</button></td>
                <td><button type="button" class="btn-close __btn-hide"  data-order_id="'.$order['donhang_id'].'" data-status="'.$order['trangthai'].'" data-bs-toggle="modal" data-bs-target="#modalHide"></button></td>
            </tr>';
        $count++;
    }
    $output .= '</table></div>';
    $output .= 
        '<div class="select-page">';
        if ($page > 1){
            $output .= 
            '<div class="pre-page">
                <button type="button" class="btn btn-primary btn-prev" data-page='.$page.'><< Prev</button>
            </div>';
        }
        if ($checkNext == 1){
            $output .= 
            '<div class="next-page">
                <button type="button" class="btn btn-primary btn-next" data-page='.$page.'>Next >></button>
            </div>
            <div class="clear"></div>
        </div>';
        }
    echo $output;
?>