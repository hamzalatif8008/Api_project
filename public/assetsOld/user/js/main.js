(function ($) {
    "use strict";

    jQuery(document).ready(function($){

        $(function(){

            var url = window.location.pathname,
                urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
            // now grab every link from the navigation
            $('.components li a').each(function(){
                // and test its normalized href against the url pathname regexp
                if(urlRegExp.test(this.href.replace(/\/$/,''))){
                    $(this).addClass('active');
                    //$(this).parent('a').removeClass('collapsed');
                    $(this).closest('ul').addClass("in");
                    $(this).closest('ul').attr("aria-expanded","true");
                    $(this).parents('li').parents('li').find('.submenu').attr("aria-expanded","true");
                }
            });

        });

        /*  Counter area  */
        $('.number').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        /*  /Counter area  */

        $('#sidebarCollapse').on('click', function () {
            $('.dashboard-sidebar-area').toggleClass('active');
            $(this).toggleClass('active');
        });

        $('#sidebar-menu').perfectScrollbar();

        /*  Product Size Check area  */
        $('.productSizeCheck').click(function(){
            $('.form-group-hidden').toggle();
        });



         $('#product-table_wrapper').dataTable({
               "language": {
                "search": "",
                "searchPlaceholder": "Search For a Record"
              },
              "ordering": false
        });
         
// product profile scroll bar
        $('.profile-notifi-content, .profile-comments-content, .profile-wishlist-content').perfectScrollbar()




    });


}(jQuery)); 