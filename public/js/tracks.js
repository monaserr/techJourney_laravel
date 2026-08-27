function toggleRoadmap(button) {
    button.classList.toggle("active");

    const roadmapContent = button.nextElementSibling;
    roadmapContent.classList.toggle("show");
}



document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.roadmap').forEach(function (button) {

        const targetId = button.getAttribute('data-bs-target');
        const target = document.querySelector(targetId);
        const arrow = button.querySelector('.roadmap-arrow');

        if (!target || !arrow) {
            return;
        }

        target.addEventListener('shown.bs.collapse', function () {
            button.classList.add('active');
            arrow.textContent = '↑';
        });

        target.addEventListener('hidden.bs.collapse', function () {
            button.classList.remove('active');
            arrow.textContent = '↓';
        });

    });


    try {

        const removed = JSON.parse(
            localStorage.getItem('techJourneyRemovedCourses') || '[]'
        );

        document.querySelectorAll('.enroll-track').forEach(function (btn) {

            if (removed.includes(String(btn.dataset.courseId))) {

                btn.disabled = false;
                btn.textContent = 'Enroll';
                btn.classList.remove('enrolled');

            }

        });

        localStorage.removeItem('techJourneyRemovedCourses');

    } catch (error) {
    }

});