//设置折扣
$(document).ready(function() {
    //TODO:延迟加载图片
    //$(".scrollLoading").scrollLoading();
 
    //添加购物车
    $(".add_to_cart").click(function() {
        var goods_id = $(this).attr('data-goods-id');
        var aj = $.ajax({
            url: __ADD_TO_CART_URL__,    
            data: {
                goods_id: goods_id,
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.msg == "true") {
                    alert("成功添加到购物车");
                } else {
                    alert('添加到购物车失败');
                }
            },
            error: function() {
                alert("异常！");
            }
        });
    });

    //添加收藏
    $(".add_to_favourite").click(function() {
        var goods_id = $(this).attr('data-goods-id');
        var aj = $.ajax({
            url: __ADD_TO_COLLECT_URL,    
            data: {
                goods_id: goods_id,
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.info == 0) {
                    //TODO:弹出ajax登录框
                } else if(data.info == 1) {
                    alert('您已经收藏过！');
                } else if(data.info == 2){
                    alert('添加收藏成功!');
                } else{
                    alert('添加收藏失败!');
                }
            },
            error: function() {
                alert("异常！");
            }
        });
    });

    
    //详情页商品数量修改
    $(".cart-plus").click(function() {
        var cart_val = $(this).prev('.cart-input').val();
        $(this).prev('.cart-input').val(parseInt(cart_val) + 1);
    });
    $(".cart-minus").click(function() {
        var cart_val = $(this).next('.cart-input').val();
        if (cart_val >= 2) {
            $(this).next('.cart-input').val(parseInt(cart_val) - 1);
        }
    });

    //添加购物车
    //购物车商品数量修改-ajax更新购物车
    $(".cart-plus").click(function() {
        var cart_val = $(this).prev('.cart-input').val();
        $(this).prev('.cart-input').val(parseInt(cart_val) + 1);
    });
    $(".cart-minus").click(function() {
        var cart_val = $(this).next('.cart-input').val();
        if (cart_val >= 2) {
            $(this).next('.cart-input').val(parseInt(cart_val) - 1);
        }
    });
    //返回顶部代码
    $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
            $("#back-to-top").fadeIn(1500);
        } else {
            $("#back-to-top").fadeOut(1500);
        }
    });
    //当点击跳转链接后，回到页面顶部位置
    $("#back-to-top").click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
});