$(document).ready(function() {
    $(document).on('blur','.cart-qty',function(){
        var id = $(this).data('prodid')
        var text = $(this).val();
        $.ajax({
            url: "./CartController/changeQtyAjax",
            method: "POST",
            data: {
                id: id,
                qty: text,
            },
            success: function(data) {
                $(this).val() = data
            }
        })
    })
    $(document).ready(function () {
        
        var defaults = {
                containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
            };
        

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
})