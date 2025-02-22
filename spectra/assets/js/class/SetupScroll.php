<script>
class SetupScroll {
    constructor(
        target,
        {
            hrefAttribute = "href",
            offset = 0,
        } = {}
    ) {
        this.elements = null;

        if (typeof target === 'string') {
            this.elements = document.querySelectorAll(target);
        } else if (target instanceof HTMLElement) {
            this.elements = [target];
        } else if (target instanceof NodeList) {
            this.elements = Array.from(target);
        } else {
            throw new Error('Parameter harus berupa selector, elemen HTML, atau NodeList.');
        }

        this.offset = typeof offset === 'number' ? offset : offset.offsetHeight || 0;
        this.hrefAttribute = hrefAttribute;

        this.elements.forEach(element => {
            element.addEventListener("click", (event) => {
                event.preventDefault(); // Hindari perilaku default
                const targetId = element.getAttribute(this.hrefAttribute)?.replace('#', '');
                if (targetId) {
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        this.scrollToWithOffset(targetElement);
                        // Ubah hash di URL
                        history.pushState(null, '', `#${targetId}`);
                    } else {
                        console.warn(`Element dengan ID "${targetId}" tidak ditemukan.`);
                    }
                } else {
                    console.warn(`Attribute "${this.hrefAttribute}" tidak valid atau tidak ada.`);
                }
            });
        });

        this.setupScrollOnLoadAndHashChange();
    }

    setupScrollOnLoadAndHashChange() {
        const setupScroll = () => {
            const hash = window.location.hash.replace('#', '');
            if (hash) {
                const targetElement = document.getElementById(hash);
                if (targetElement) {
                    this.scrollToWithOffset(targetElement);
                }
            }
        };

        document.addEventListener('DOMContentLoaded', setupScroll);
        window.addEventListener('hashchange', setupScroll);
        window.addEventListener('load', setupScroll);
    }

    scrollToWithOffset(targetElement) {
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - this.offset;
        window.scrollTo({
            top: targetPosition,
            behavior: "smooth"
        });
    }
}
</script>
