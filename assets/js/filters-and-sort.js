// Category filter 

jQuery(".category-select").click(function () {
    let isOpen = jQuery(this).toggleClass("open").hasClass("open");

    if (isOpen) {
        jQuery(".category-select li:first-child").html('Catégories <img class="category-chevron" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/chevron-down.png">');
    }

    jQuery(".category-chevron").toggleClass("category-chevron-rotate", isOpen);
    jQuery(".category").toggleClass("category-active", isOpen);
});

jQuery(".category-list").click(function () {
    let selected_li = jQuery(this).html();
    jQuery(".category-select li:first-child").html(selected_li + ' <img class="category-chevron" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/chevron-down.png">');
    jQuery(".category-list").removeClass("category-li-focus");
    jQuery(this).addClass("category-li-focus");
});

// Format filter

jQuery(".format-select").click(function () {
    let isOpen = jQuery(this).toggleClass("open").hasClass("open");

    if (isOpen) {
        jQuery(".format-select li:first-child").html('Formats <img class="format-chevron" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/chevron-down.png">');
    }

    jQuery(".format-chevron").toggleClass("format-chevron-rotate", isOpen);
    jQuery(".format").toggleClass("format-active", isOpen);
});

jQuery(".format-list").click(function () {
    let selected_li_format = jQuery(this).html();
    jQuery(".format-select li:first-child").html(selected_li_format + ' <img class="category-chevron" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/chevron-down.png">');
    jQuery(".format-list").removeClass("format-li-focus");
    jQuery(this).addClass("format-li-focus");
});

// Sort-by  

jQuery(".date-select").click(function () {
    let isOpen = jQuery(this).toggleClass("open").hasClass("open");

    if (isOpen) {
        jQuery(".date-select li:first-child").html('Trier par <img class="sort-by-chevron" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/chevron-down.png">');
    }

    jQuery(".sort-by-chevron").toggleClass("sort-by-chevron-rotate", isOpen);
    jQuery(".sort-by").toggleClass("sort-by-active", isOpen);
});

jQuery(".sort-by-list").click(function () {
    let selected_li_date = jQuery(this).html();
    jQuery(".date-select li:first-child").html(selected_li_date + ' <img class="category-chevron" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/chevron-down.png">');
    jQuery(".sort-by-list").removeClass("sort-by-li-focus");
    jQuery(this).addClass("sort-by-li-focus");
});

// Filter and sort by Script 

// Define variables to store selected filter values
let selectedCategory = null;
let selectedFormat = null;
let selectedSortBy = "DESC";

const applyOptionSelection = () => {
    document.getElementById("photo-list").innerHTML = "";
    fetchFilteredPhotos(selectedCategory, selectedFormat, selectedSortBy);
};

const fetchFilteredPhotos = () => {
    jQuery.ajax({
        type: "POST",
        url: "wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
            action: "filter_and_sort_photos",
            categorie: selectedCategory,
            format: selectedFormat,
            date: selectedSortBy,
        },
        success: response => {
            jQuery("#photo-list").append(response);
            Lightbox.init();
        },
        error: error => {
            console.log(error.statusText);
        },
    });
};

const handleOptionClick = (optionClass, optionVariable) => {
    jQuery(optionClass).click(function () {
        const optionValue = jQuery(this).attr("data-value");

        // Update the selected value based on the option variable
        if (optionVariable === "selectedCategory") {
            selectedCategory = optionValue;
        } else if (optionVariable === "selectedFormat") {
            selectedFormat = optionValue;
        } else if (optionVariable === "selectedSortBy") {
            selectedSortBy = optionValue;
        }

        // Apply the filter selection
        applyOptionSelection();
    });
};

// Attach click handlers to filter options
handleOptionClick(".category-list", "selectedCategory");
handleOptionClick(".format-list", "selectedFormat");
handleOptionClick(".sort-by-list", "selectedSortBy");