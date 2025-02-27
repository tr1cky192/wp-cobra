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
