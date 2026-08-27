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
        card.style.display = "block";
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

    const animatedElements = document.querySelectorAll(
        ".about-badge, " +
        ".about-line, " +
        ".about-title, " +
        ".about-subtitle, " +
        ".tracks-badge, " +
        ".track-line, " +
        ".tracks-title, " +
        ".tracks-subtitle, " +
        ".events-badge, " +
        ".events-subtitle, " +
        ".about-card, " +
        ".track-card, " +
        ".home-event-card, " +
        ".assess-banner"
    );

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
            threshold: 0.15
        }
    );

    animatedElements.forEach(function (element) {
        observer.observe(element);
    });


    /* =========================================
       HERO BUTTON ANIMATION
    ========================================= */

    const heroButton = document.querySelector(".hero-button");

    if (heroButton) {
        heroButton.style.opacity = "0";
        heroButton.style.transform = "translateX(-50px)";

        setTimeout(function () {
            heroButton.style.opacity = "1";
            heroButton.style.transform = "translateX(0)";
        }, 600);
    }

});