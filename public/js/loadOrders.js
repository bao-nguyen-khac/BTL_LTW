$(document).ready(function () {
    function fetchData() {
        $.ajax({
            url: "./AdminController/ordersListAjax",
            success: function (data) {
                $('.temp').html(data);
            }
        })
    }
    fetchData()
    setInterval(fetchData, 1000);
    $(document).on('click','.__btn-status',function(){
        var id = $(this).data('order_id')
        var status = $(this).data('status')
        if(status != 2){
            a = document.querySelector('.admin-action');
            a.href = "./AdminController/changeAction/" + id
        }
        
    })
    $(document).on('click','.__btn-hide',function(){
        var id = $(this).data('order_id')
        var status = $(this).data('status')
        if(status == 2){
            a = document.querySelector('.admin-hide');
            a.href = "./AdminController/hideOrder/" + id
        }
        
    })
})