document.addEventListener("DOMContentLoaded", function () {
    let dropdown = document.querySelector(".menu-item.dropdown");

    dropdown.addEventListener("click", function (event) {
        event.preventDefault();
        let menu = this.querySelector(".dropdown-menu");

        document.querySelectorAll(".menu-item.dropdown").forEach(item => {
            if (item !== dropdown) {
                item.classList.remove("open");
            }
        });

        this.classList.toggle("open");
    });

    document.addEventListener("click", function (event) {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove("open");
        }
    });
});
jQuery(function($) {
    if ($('body').hasClass('page-id-95')) { 
        $(document.body).on('updated_wc_div', function() {
            $(document.body).trigger('wc_update_cart');
        });

        $(document.body).trigger('wc_update_cart'); 
    }
});