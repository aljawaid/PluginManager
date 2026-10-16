// KANBOARD PLUGIN ASSET FILE

(function () {
    "use strict";

    document.addEventListener("click", function (event) {
        const link = event.target.closest('a[href^="#main"], a[href^="#PluginTop"]');

        if (!link) {
            return;
        }

        const target = document.querySelector(link.getAttribute("href"));
        if (!target) {
            return;
        }

        event.preventDefault();

        const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        const targetTop = Math.max(0, target.getBoundingClientRect().top + window.scrollY - 100);

        window.scrollTo({
            top: targetTop,
            behavior: reduceMotion ? "auto" : "smooth",
        });
    });
}());
