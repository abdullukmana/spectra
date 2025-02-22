<?= $this->include('spectra/assets/js/class/ListItemHighlighter') ?>

<?= $this->include('spectra/assets/js/function/removeElementOnLoad') ?>
<?= $this->include('spectra/assets/js/function/setElementPositionAndHeight') ?>

<script src="https://cdn.jsdelivr.net/npm/fuse.js/dist/fuse.js"></script>

<script>
    const header = document.querySelector('header');
    const viewportHeight = window.innerHeight;
    const headerHeight = header.offsetHeight;

    const percentage = (headerHeight / viewportHeight) * 100;
    const scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#links',
        rootMargin: '100% 1px -100%'
    });
    removeElementOnLoad('.loader-section');
    
    setElementPositionAndHeight({
        selectorOrElement: '.sidebar',
        height: window.innerHeight - header.offsetHeight,
        top: header.offsetHeight
    });

    window.addEventListener("resize", () => {
        setElementPositionAndHeight({
            selectorOrElement: '.sidebar',
            height: window.innerHeight - header.offsetHeight,
            top: header.offsetHeight
        });
    });

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>

<script src="https://cdn.jsdelivr.net/npm/fuse.js/dist/fuse.js"></script>
<script>
    let searchInput = document.getElementById("searchInput");
    const searchModal = document.getElementById("search");
    const limit = 5;
    const links = <?= json_encode(!empty($links) ? $links : []) ?>;
    const isEmpty = input => input.trim() === "";

    const myListHighlighter = new ListItemHighlighter({
        container: '#list-group',
        template: function(data) {
            let iconClass;
            switch (data.type) {
                case 'page':
                    iconClass = '<i class="bi bi-arrow-up-right-square fs-5"></i>';
                    break;
                case 'section':
                    iconClass = '<i class="bi bi-hash fs-5"></i>';
                    break;
                default:
                    iconClass = '<i class="bi bi-file-earmark-text fs-5"></i>';
            }

            return [
                `<li class="list-group-item list-group-item-action d-flex gap-1 align-items-center justify-content-center" aria-current="false">`,
                    `<a href="${data.url}" data-id="${data.id}" class="text-decoration-none text-truncate flex-grow-1 d-flex flex-nowrap h-100">`,
                        `${iconClass}`, 
                        `<h6 class="m-0 flex-grow-1 text-truncate ms-3">`,
                            `${data.title}</br>`,
                            `<small>${data.description}</small>`,
                        `</h6>`,
                    `</a>`,
                `</li>`
            ].join("");
        }
    });

    searchModal.addEventListener('shown.bs.modal', event => {
        searchInput.focus();
        searchInput.value = "";
        myListHighlighter.renderList(links.slice(0, limit));
        myListHighlighter.resetActiveIndex();
    });

    searchInput.addEventListener('keydown', (event) => {
        switch (event.key) {
            case 'ArrowDown':
                myListHighlighter.moveToNext();
                break;
            case 'ArrowUp':
                myListHighlighter.moveToPrevious();
                break;
            case 'Enter':
                myListHighlighter.clickActiveAnchor();
                break;
            default:
                break;
        }
    });

    searchInput.addEventListener("input", (event) => {
        myListHighlighter.resetActiveIndex();
        if (isEmpty(searchInput.value)) {
            myListHighlighter.renderList(links.slice(0, limit));
        } else {
            const options = {
                includeMatches: true,
                includeScore: true,
                keys: ['title', 'description']
            };

            const fuse = new Fuse(links, options);
            const result = fuse.search(searchInput.value.trim());

            if(!Array.isArray(result) || result.length === 0) {
                myListHighlighter.renderElement(
                    `<div class="py-5"><p class="mb-00 text-center">Tidak ada hasil yang ditemukan</p></div>`
                );
            }else {
                const searchQuery = searchInput.value.trim();
                const formattedResults = result.map(res => {
                    const highlightedItem = { ...res.item };

                    ['title', 'description'].forEach(key => {
                        if (highlightedItem[key]) {
                            highlightedItem[key] = highlightedItem[key].replace(
                                new RegExp(`(${searchQuery})`, 'gi'),
                                '<span class="text-warning text-underline">$1</span>'
                            );
                        }
                    });

                    return highlightedItem;
                });

                myListHighlighter.renderList(formattedResults);
            }
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.ctrlKey && event.key.toLowerCase() === "k") {
            event.preventDefault();
            document.querySelector("[data-bs-target='#search']").click();
        }
    });
</script>