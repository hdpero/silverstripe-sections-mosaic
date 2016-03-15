(function($){
    $(document).ready(function() {

        // // fancybox
        // $(".fancybox").fancybox({
        //     openEffect  : 'none',
        //     closeEffect : 'none',
        //     helpers : {
        //         media : {}
        //     }
        // });

        $('#imageContainer li').wookmark(
            {
                align: 'center',
                autoResize: true,
                comparator: null,
                container: $('#imageContainer'),
                direction: "left",
                ignoreInactiveItems: true,
                itemWidth: "20%",
                fillEmptySpace: true,
                flexibleWidth: true,
                offset: 2,
                onLayoutChanged: true,
                outerOffset: 0
            }
        );
    });
})(jQuery);
