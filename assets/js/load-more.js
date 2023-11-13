let currentPage = 1;

jQuery("#load-more-button").on("click", function () {
    jQuery.ajax({
        type: "POST",
        url: "wp-admin/admin-ajax.php",
        dataType: "json",
        data: {
            action: "load_more",
            paged: ++currentPage,
        },
        success: ({ max, html }) => {
            jQuery("#load-more-button").toggle(currentPage < max);
            jQuery(".photo-list").append(html);
        },
    });
});