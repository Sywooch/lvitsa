$(document).ready(function(){
    var sizes=[];



   $('.cart-put-button').click(function(){
       var id=$(this).attr('data-id');

       var chosen_sizes=$('.chosen-size');

       for (var i=0;i<chosen_sizes.length;i++){
           sizes.push(chosen_sizes[i].innerText);
       }

       if (chosen_sizes.length==0) {
          $('.size-title').addClass('cart-put-error text-danger');
       } else {
           $('.size-title').removeClass('cart-put-error text-danger');
           $.ajax({
               url:'/category/add',
               type:'post',
               data: {product_id:id,
                   sizes:sizes  },
               /*success: function(data){
                   $('.totalCost').text(data.cost);
                   $('.totalCount').text(data.quantity);
           }*/
   });

           $.ajax({
               url:'/cart/test',
               //type:'post',
              /* data: {product_id:id,
                   sizes:sizes  },*/
               success: function(data){
                   $('.cart-logo').load('/cart/test/');
               }
           });



    /*$.getJSON( "/cart/cartinfo", function( data ) {
        alert(data.quantity);
    });*/

    $(".order-message").fadeIn(400).delay(2000).fadeOut(400);
       }

       setTimeout("$('.size').each(function(index,element){$(element).removeClass('chosen-size');})", 2000);

       //$('.size').each(function(index,element){$(element).removeClass('chosen-size');});
       sizes=[];
   });

    $(function(){
        $('#products').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            //generateNextPrev: true,
            generatePagination: false
        });
    });

    $('.product-delete').click(function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url:'/cart/delete',
            type:'post',
            data: {product_id:id},
        });
    });


    $('.size').click(function(){
        $(this).toggleClass('chosen-size');
    });

    $('.groupped_elements').fancybox({
        'changeSpeed':10000,
      });



    });



