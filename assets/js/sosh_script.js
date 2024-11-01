jQuery(function ($) {

    var transObj = sosh_script_js_vars_object,
        assetsUrl = transObj.assets_url;

    $('.sosh-network-btn').click(function (e) {
        e.preventDefault();

        window.open($(this).attr("href"), '', 'width=500,height=350');
    });

// Modal
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: transObj.x_url,
                cache:false,
                data: {
                    'action': 'modal_action'
                },
                success: function (response) {
                    if (response.success) {
                        $('#sosh_btns_modal').soshmodal('show');
                    }
                }
            });
        }
    });

    if($('img').length) {

        $('img').each(function () {
            if ($(this).width > 120){
                var image = this,
                    largeWidth = image.width;
                return false;
            }
        });

        if (typeof image !== 'undefined' && typeof largeWidth !== 'undefined') {
            $('img').each(function () {
                if (/\.(jpg|png)$/.test($(this).attr('src'))) {
                    image = ($(this).width > largeWidth) ? this : image;
                }
            });

            var bg = $('.soshmodal-content').css('background-image');
            bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");

            if (!(/\.(jpg|png)$/.test(bg)) || $('.soshmodal-content').css('background-image') === 'none') {
                var imageSrc = image.attr('src');
                $('.soshmodal-content').css('background-image', 'url(' + imageSrc + ')');
            }
        }
    }
//end Modal


});