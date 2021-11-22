<?php
    $output = '
        <h3>List orders</h3>
        <table class="admin-table">
            <tr>
                <td>Order ID</td>
                <td>Order Time</td>
                <td>Products</td>
                <td>Total Price</td>
                <td>Customer</td>
                <td>Status</td>
                <td>Hide</td>
            </tr>';
    $count = 1;
    foreach ($order_detail as $order) {
        $status = '';
        if($order['status'] == 0){
            $status = 'Pending';
        }else if($order['status'] == 1){
            $status = 'Shiping...';
        }else{
            $status = 'Done';
        }
        $output .= '
            <tr>
                <td> '.$order['order_id'].' </td>
                <td> '.$order['date_order'].' </td>
                <td>';
        foreach ($order['products'] as $product) {
            $output .= $product['product_name'] .' x '.$product['qty'].'<br>';
        }
        $output .= '</td>
                <td> '.number_format($order['totalprice']) .'đ</td>
                
                <td><a href="./AdminController/viewCustomer/'.$order['customer_id'] .'">View customer</a></td>
                <td><button type="button" class="btn btn-primary __btn-status" data-order_id="'.$order['order_id'].'" data-bs-toggle="modal" data-bs-target="#modalAction">'.$status.'</button></td>
                <td><button type="button" class="btn-close __btn-hide"  data-order_id="'.$order['order_id'].'" data-status="'.$order['status'].'" data-bs-toggle="modal" data-bs-target="#modalHide"></button></td>
            </tr>';
        $count++;
    }
    $output .= '</table>';
    echo $output;
?>