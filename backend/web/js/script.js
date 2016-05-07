/**
 * Created by Home on 14.11.2015.
 */
$(document).ready(function(){
    $('.delete-image').click(function(){
        $(this).parents('.img_update').fadeOut('500',function(){$(this).parents('.img_update').remove()});

        var imageId=$(this).attr('image-id');
        $.ajax({
            url: '/admin/products/deleteimage',
            type: 'post',
            data : {
                imageId : imageId
            },
            success: function(){
                console.log('ok');
            }
        });
    });
});