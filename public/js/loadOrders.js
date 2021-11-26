$(document).ready(function () {
    var page = 1
    function fetchData() {
        console.log(page)
        $.ajax({
            url: "./AdminController/ordersListAjax/" + page,
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
    $(document).on('click','.btn-prev',function(){
        page = $(this).data('page') - 1
        $.ajax({
            url: "./AdminController/ordersListAjax/" + page,
            success: function (data) {
                $('.temp').html(data);
            }
        })
    })
    $(document).on('click','.btn-next',function(){
        page = $(this).data('page') + 1
        $.ajax({
            url: "./AdminController/ordersListAjax/" + page,
            success: function (data) {
                $('.temp').html(data);
            }
        })
    })
    

})