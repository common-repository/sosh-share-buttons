jQuery(function($){
    //alert(transObj.x_url);
    //$('[data-slug="social-share"] span[class="deactivate"] a').addClass('freee');
    $('[data-slug="social-share"] span[class="deactivate"] a').click(function(e){
        e.preventDefault();
        var urlRedirect = $('[data-slug="social-share"] span[class="deactivate"] a').attr('href');

        if (confirm('The saved data will be deleted. Press "Cancel" to keep.')) {
            removeData();
        }
        else{
            window.location.href = urlRedirect;
        }
    });

    var removeData = function(){
        $.ajax({
            type: 'POST',
            url: transObj.x_url,
            cache:false,
            data: {
                'action': 'sosh_uninstal_action',
                'sosh_deactivate_remove_data': true
            },
            success: function (response) {
                console.log(response);
            }
        });
        window.location.href = $('[data-slug="social-share"] span[class="deactivate"] a').attr('href');
    };
});