// KANBOARD PLUGIN ASSET FILE

(function () {
    "use strict";

    function getPageMessages() {
        const source = document.querySelector("[data-pm-new-window-title], [data-pm-copied]");

        return {
            copied: source?.dataset.pmCopied || "Copied",
            copyFailed: source?.dataset.pmCopyFailed || "Unable to copy",
            newWindow: source?.dataset.pmNewWindowTitle || "Opens in a new window",
        };
    }

    function initialiseInstalledFilter() {
        const input = document.getElementById("InstalledPluginsFilterInput");
        const form = input?.closest("form");

        if (!input) {
            return;
        }

        input.addEventListener("input", function () {
            const query = input.value.trim().toLocaleLowerCase();

            document.querySelectorAll("#InstalledPluginsTable tbody").forEach(function (plugin) {
                plugin.hidden = !plugin.textContent.toLocaleLowerCase().includes(query);
            });
        });

        form?.addEventListener("submit", function (event) {
            event.preventDefault();
        });
    }

    function initialiseDirectoryFilters() {
        const input = document.getElementById("AvailablePluginsFilterInput");
        const form = input?.closest("form");
        const filters = Array.from(document.querySelectorAll(".plugin-type-count-section"));
        const plugins = Array.from(document.querySelectorAll("table.available-plugins-table"));
        let activeType = "";

        if (!input && filters.length === 0) {
            return;
        }

        function applyFilters() {
            const query = input?.value.trim().toLocaleLowerCase() || "";

            plugins.forEach(function (plugin) {
                const matchesText = plugin.textContent.toLocaleLowerCase().includes(query);
                const matchesType = activeType === "" || plugin.dataset.type === activeType;
                plugin.hidden = !(matchesText && matchesType);
            });

            filters.forEach(function (filter) {
                const isActive = filter.dataset.type === activeType;
                filter.classList.toggle("is-active", isActive);
                filter.setAttribute("aria-pressed", String(isActive));
            });
        }

        input?.addEventListener("input", applyFilters);
        form?.addEventListener("submit", function (event) {
            event.preventDefault();
        });

        filters.forEach(function (filter) {
            filter.addEventListener("click", function () {
                activeType = activeType === filter.dataset.type ? "" : filter.dataset.type;
                applyFilters();
            });
        });
    }

    function initialiseDateToggles() {
        document.querySelectorAll(".date-toggle").forEach(function (toggle) {
            function switchDate() {
                const relative = toggle.querySelector(".relative-date");
                const exact = toggle.querySelector(".exact-date");

                if (!relative || !exact) {
                    return;
                }

                relative.hidden = !relative.hidden;
                exact.hidden = !exact.hidden;
            }

            toggle.addEventListener("click", switchDate);
            toggle.addEventListener("keydown", function (event) {
                if (event.key === "Enter" || event.key === " ") {
                    event.preventDefault();
                    switchDate();
                }
            });
        });
    }

    function initialiseClipboard(selector, messages) {
        if (typeof window.ClipboardJS !== "function") {
            return;
        }

        const originalMarkup = new WeakMap();
        const clipboard = new window.ClipboardJS(selector);

        function showStatus(event, successful) {
            const trigger = event.trigger;

            if (!originalMarkup.has(trigger)) {
                originalMarkup.set(trigger, {
                    html: trigger.innerHTML,
                    ariaLabel: trigger.getAttribute("aria-label"),
                });
            }

            const original = originalMarkup.get(trigger);
            trigger.textContent = successful ? "✓" : "✕";
            trigger.classList.toggle("pm-copy-success", successful);
            trigger.classList.toggle("pm-copy-failure", !successful);
            trigger.setAttribute("aria-label", successful ? messages.copied : messages.copyFailed);
            event.clearSelection();

            window.setTimeout(function () {
                trigger.innerHTML = original.html;
                trigger.classList.remove("pm-copy-success", "pm-copy-failure");

                if (original.ariaLabel === null) {
                    trigger.removeAttribute("aria-label");
                } else {
                    trigger.setAttribute("aria-label", original.ariaLabel);
                }
            }, 2500);
        }

        clipboard.on("success", function (event) {
            showStatus(event, true);
        });
        clipboard.on("error", function (event) {
            showStatus(event, false);
        });
    }

    function initialiseExternalDescriptionLinks(messages) {
        document.querySelectorAll(".available-plugin-description .markdown a").forEach(function (link) {
            link.target = "_blank";
            link.rel = "noopener noreferrer";
            link.title = messages.newWindow;
        });
    }

    function initialiseUpdateCopy() {
        if (!window.KB?.onClick) {
            return;
        }

        window.KB.onClick(".js-updates-copy-paste", function (event) {
            const source = window.KB.dom(event.target);
            const targetField = window.KB.find(source.data("updateTarget"));

            if (targetField) {
                targetField.build().value = source.data("update");
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const messages = getPageMessages();

        initialiseInstalledFilter();
        initialiseDirectoryFilters();
        initialiseDateToggles();
        initialiseClipboard(".copy-installed-list-format", messages);
        initialiseClipboard(".copy-url-link-format", messages);
        initialiseExternalDescriptionLinks(messages);
        initialiseUpdateCopy();
    });
}());
