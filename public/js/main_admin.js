$(document).on('click','.btn-del-product',function(){
    var id = $(this).data('id-product')
    a = document.querySelector('.admin-delete-product');
    a.href = "./AdminController/deleteProduct/" + id
})