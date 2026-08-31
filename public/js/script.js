document.querySelectorAll(".evt-filter-btn").forEach((button) => {
    button.addEventListener("click", () => {
        document
            .querySelectorAll(".evt-filter-btn")
            .forEach((btn) => btn.classList.remove("active"));

        button.classList.add("active");

        const filter = button.getAttribute("data-filter");

        document.querySelectorAll(".evt-card-item").forEach((card) => {
            const category = card.getAttribute("data-category");

            if (filter === "all" || category.includes(filter)) {
                card.style.display = "flex";
            } else {
                card.style.display = "none";
            }
        });
    });
});


const eventImage = document.getElementById("event_image");
const eventFileName = document.getElementById("eventFileName");

if (eventImage && eventFileName) {
    eventImage.addEventListener("change", function () {
        if (this.files.length > 0) {
            eventFileName.textContent = this.files[0].name;
            eventFileName.classList.add("selected");
        } else {
            eventFileName.textContent = "No file chosen";
            eventFileName.classList.remove("selected");
        }
    });
}


function openBooking(title, price, id, date, location, imageSrc) {
    document.getElementById("modalEventName").innerText = title;

    document.getElementById("modalPrice").innerText =
        price == 0 ? "Free" : "EGP " + price;

    document.getElementById("modalEventId").value = id;
    document.getElementById("modalDate").innerText = date;
    document.getElementById("modalLocation").innerText = location;
    document.getElementById("modalImage").src = imageSrc;
}


document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       SCROLL ANIMATIONS
    ========================================= */

    const animatedElements = document.querySelectorAll(`
        .about-badge,
        .about-line,
        .about-title,
        .about-subtitle,
        .tracks-badge,
        .track-line,
        .tracks-title,
        .tracks-subtitle,
        .events-badge,
        .events-subtitle,
        .about-card,
        .track-card,
        .home-event-card,
        .assess-banner
    `);

    console.log("Animated elements:", animatedElements);

    const observer = new IntersectionObserver(
        function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");

                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.15,
        }
    );

    animatedElements.forEach(function (element) {
        observer.observe(element);
    });


   

    /* =========================================
       EVENTS PAGE SCROLL ANIMATION
    ========================================= */

    const eventAnimatedElements = document.querySelectorAll(
        ".evt-title, " +
        ".evt-filter-btn, " +
        ".evt-card-item"
    );

    const eventObserver = new IntersectionObserver(
        function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");

                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.15,
        }
    );

    eventAnimatedElements.forEach(function (element) {
        eventObserver.observe(element);
    });

});


/* =========================================
   DARK MODE
========================================= */

document.addEventListener("DOMContentLoaded", function () {

    const body = document.body;

    // Get both dark mode buttons
    const toggleButtons = document.querySelectorAll(
        "#themeToggle, #themeToggleStudent"
    );

    // Check saved theme
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
    }

    // Remove preload class
    document.documentElement.classList.remove("preload-dark");

    // Add click event to both buttons
    toggleButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            body.classList.toggle("dark-mode");

            // Save theme
            localStorage.setItem(
                "theme",
                body.classList.contains("dark-mode")
                    ? "dark"
                    : "light"
            );

        });

    });

});