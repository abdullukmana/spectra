<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Parkinsans:wght@300..800&display=swap');
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

:root,
[data-bs-theme=light] {
    --bs-font-sans-serif: "Parkinsans", sans-serif;
    --bs-font-monospace: "JetBrains Mono", serif;
    --bs-primary: #198754;
    --bs-primary-rgb: 25, 135, 84;
    --bs-link-hover-color: #149a5c !important;
    --bs-link-hover-color-rgb: 20, 154, 92 !important;
}

.link-primary:focus, .link-primary:hover {
    color: RGBA(var(--bs-link-hover-color-rgb), var(--bs-link-opacity, 1)) !important;
    -webkit-text-decoration-color: RGBA(var(--bs-link-hover-color-rgb), var(--bs-link-underline-opacity, 1)) !important;
    text-decoration-color: RGBA(var(--bs-link-hover-color-rgb), var(--bs-link-underline-opacity, 1)) !important;
}

[data-bs-theme=dark] {
    color-scheme: dark;
    --bs-primary: #7ec69a;
    --bs-primary-rgb: 126, 198, 154;
}

.btn-costum-primary {
    --bs-btn-font-weight: normal;
    --bs-btn-color: var(--bs-body-color);
    --bs-btn-bg: var(--bs-body-bg);
    --bs-btn-border-color: var(--bs-border-color);
    --bs-btn-hover-color: var(--bs-body-color);
    --bs-btn-hover-bg: var(--bs-secondary-bg);
    --bs-btn-hover-border-color: var(--bs-body-color);
    --bs-btn-active-color: var(--bs-body-color);
    --bs-btn-active-bg: var(--bs-secondary-bg);
    --bs-btn-active-border-color: var(--bs-border-color);
}

input[type="checkbox"]:checked {
    background-color: var(--bs-body-color);
}

@media(min-width: 576px) {
    .primary-layout-grid {
        display: grid;
        grid-template-columns: 260px calc(100% - 260px);
    }

    .primary-layout-grid .sidebar {
        height: var(--element-height);
        position: sticky;
        top: var(--element-top);
    }
}

@media(min-width: 1200px) {
    .secondary-layout-grid {
        display: grid;
        grid-template-columns: calc(100% - 260px) 260px;
    }

    .secondary-layout-grid .sidebar {
        height: var(--element-height);
        position: sticky;
        top: var(--element-top);
    }
}

@media(max-width: 576px) {
    .sidebar {
        max-width: 18rem;
    }
}

.sidebar .list-group {
    --bs-list-group-color: var(--bs-body-color);
    --bs-list-group-bg: var(--bs-transparent);
    --bs-list-group-border-color: var(--bs-transparent);
    --bs-list-group-border-width: var(--bs-border-width);
    --bs-list-group-border-radius: 0;
    --bs-list-group-item-padding-x: 1.25rem;
    --bs-list-group-item-padding-y: .35rem;
    --bs-list-group-action-color: var(--bs-secondary-color);
    --bs-list-group-action-hover-color: var(--bs-emphasis-color);
    --bs-list-group-action-hover-bg: var(--bs-tertiary-bg);
    --bs-list-group-action-active-color: var(--bs-body-color);
    --bs-list-group-action-active-bg: var(--bs-secondary-bg);
    --bs-list-group-disabled-color: var(--bs-secondary-color);
    --bs-list-group-disabled-bg: var(--bs-body-bg);
    --bs-list-group-active-color: var(--bs-black);
    --bs-list-group-active-bg: var(--bs-secondary-bg);
    --bs-list-group-active-border-color: var(--bs-transparent);
    display: flex;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    border-radius: var(--bs-list-group-border-radius);
}

.sidebar .list-group-item+.list-group-item.active {
    margin-top: 0 !important;
    border-top-width: 0 !important;
}

.accordion {
    --bs-accordion-color: var(--bs-body-color);
    --bs-accordion-bg: var(--bs-transparent);
    --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
    --bs-accordion-border-color: var(--bs-border-color);
    --bs-accordion-border-width: var(--bs-border-width);
    --bs-accordion-border-radius: 0;
    --bs-accordion-inner-border-radius: 0;
    --bs-accordion-btn-padding-x: 1.25rem;
    --bs-accordion-btn-padding-y: 0.5rem;
    --bs-accordion-btn-color: var(--bs-body-color);
    --bs-accordion-btn-bg: transparent;
    --bs-accordion-btn-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
    --bs-accordion-btn-icon-width: 1.25rem;
    --bs-accordion-btn-icon-transform: rotate(-180deg);
    --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
    --bs-accordion-btn-active-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23052c65'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
    --bs-accordion-btn-focus-border-color: #86b7fe;
    --bs-accordion-btn-focus-box-shadow: none;
    --bs-accordion-body-padding-x: 0rem;
    --bs-accordion-body-padding-y: 0rem;
    --bs-accordion-active-color: var(--bs-body-color);
    --bs-accordion-active-bg: var(--bs-transparent);
}

.accordion .accordion-item:first-of-type {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.accordion .accordion-item:last-of-type {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.accordion .accordion-item {
    color: var(--bs-accordion-color);
    background-color: var(--bs-accordion-bg);
    border: none;
}

.accordion .accordion-button:not(.collapsed) {
    color: var(--bs-accordion-active-color);
    background-color: var(--bs-accordion-active-bg);
    box-shadow: none;
}

.accordion .accordion-button small.chevron {
    transition: 0.2s;
    transform: rotate(-90deg);
}

.accordion .accordion-button:not(.collapsed) small.chevron {
    transform: rotate(0deg);
}

.accordion .accordion-button {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x);
    font-size: 1rem;
    color: var(--bs-accordion-btn-color);
    text-align: left;
    background-color: var(--bs-accordion-btn-bg);
    border: none;
    border-radius: 0 !important;
    overflow-anchor: none;
    transition: var(--bs-accordion-transition);
    letter-spacing: 1px;
}

.accordion .accordion-button:hover {
    background-color: var(--bs-tertiary-bg);
}

.accordion .accordion-button:active {
    background-color: var(--bs-secondary-bg);
}

.accordion .accordion-button::after {
    content: none;
}

.avatar {
    width: 30px;
    height: 30px;
    z-index: 10;
}

.avatar-sm {
    width: 70px;
    height: 70px;
}

.avatar-md {
    width: 100px;
    height: 100px;
}

.position-sticky {
    z-index: 10 !important;
}

.modal .list-group {
    --bs-list-group-color: var(--bs-body-color);
    --bs-list-group-bg: var(--bs-transparent);
    --bs-list-group-border-color: var(--bs-border-color);
    --bs-list-group-border-width: var(--bs-border-width);
    --bs-list-group-border-radius: var(--bs-border-radius);
    --bs-list-group-item-padding-x: 1rem;
    --bs-list-group-item-padding-y: 0.5rem;
    --bs-list-group-action-color: var(--bs-secondary-color);
    --bs-list-group-action-hover-color: var(--bs-emphasis-color);
    --bs-list-group-action-hover-bg: var(--bs-tertiary-bg);
    --bs-list-group-action-active-color: var(--bs-body-color);
    --bs-list-group-action-active-bg: var(--bs-secondary-bg);
    --bs-list-group-disabled-color: var(--bs-secondary-color);
    --bs-list-group-disabled-bg: var(--bs-body-bg);
    --bs-list-group-active-color: var(--bs-bg-tertiary);
    --bs-list-group-active-bg: var(--bs-primary);
    --bs-list-group-active-border-color: var(--bs-border-color);
    display: flex;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    border-radius: var(--bs-list-group-border-radius);
}

.modal .list-group-item+.list-group-item.active {
    margin-top: 0 !important;
    border-top-width: 0 !important;
}

.modal .list-group-item a {
    color: var(--bs-text-body);
}

.modal .list-group-item .btn {
    transition: 0s;
}

.modal .list-group-item.active a, 
.modal .list-group-item.active .btn {
    color: var(--bs-body-bg);
}

.modal-backdrop, .offcanvas-backdrop {
    background: var(--bs-body-bg);
    opacity: 0.75 !important;
}

.badge {
    word-wrap: break-word !important;
    white-space: wrap !important;
    text-align: left;
}

.loader {
    width: 45px;
    aspect-ratio: .75;
    --c: no-repeat linear-gradient(var(--bs-primary) 0 0);
    background:
        var(--c) 0%   50%,
        var(--c) 50%  50%,
        var(--c) 100% 50%;
    animation: l7 1s infinite linear alternate;
}

@keyframes l7 {
    0%  {background-size: 20% 50%, 20% 50%, 20% 50%}
    20% {background-size: 20% 20%, 20% 50%, 20% 50%}
    40% {background-size: 20% 100%, 20% 20%, 20% 50%}
    60% {background-size: 20% 50%, 20% 100%, 20% 20%}
    80% {background-size: 20% 50%, 20% 50%, 20% 100%}
    100%{background-size: 20% 50%, 20% 50%, 20% 50%}
}

.table thead tr {
    border-top: none;
}

.table thead tr th:first-child,
.table tbody tr td:first-child {
    border-left: none;
}

.table tbody tr {
    border-bottom: none;
}

.table thead tr th:last-child,
.table tbody tr td:last-child {
    border-right: none;
}

td {
    vertical-align: middle;
}

td:focus {
    outline: none;
    background-color: var(--bs-tertiary-bg);
    border: none;
}

.bg-tertiary {
    background-color: var(--bs-tertiary-bg) !important;
}
</style>