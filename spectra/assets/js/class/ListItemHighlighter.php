<script>
class ListItemHighlighter {
    constructor({ container, template, itemSelector = 'li' }) {
        this.container = typeof container === 'string' ? document.querySelector(container) : container;
        this.template = template;
        this.itemSelector = itemSelector;
        this.activeIndex = -1;

        if (!this.container) return;

        this.attachEventListeners();
    }

    attachEventListeners() {
        const listItems = this.container.querySelectorAll(this.itemSelector);

        listItems.forEach((item, index) => {
            item.addEventListener('mouseover', () => this.setActive(item, index));
        });
    }

    setActive(listItem, index) {
        this.container.querySelectorAll(this.itemSelector).forEach(item => item.classList.remove('active'));
        listItem.classList.add('active');
        listItem.focus();
        this.activeIndex = index;
    }

    setActiveByIndex(index) {
        const listItems = Array.from(this.container.querySelectorAll(this.itemSelector));
        if (index >= 0 && index < listItems.length) {
            this.setActive(listItems[index], index);
        }
    }

    moveToPrevious() {
        const listItems = this.container.querySelectorAll(this.itemSelector);
        if (listItems.length === 0) return;

        if (this.activeIndex === -1) {
            this.setActiveByIndex(0);
        } else {
            const newIndex = (this.activeIndex === 0) ? listItems.length - 1 : this.activeIndex - 1;
            this.setActiveByIndex(newIndex);
        }
    }

    moveToNext() {
        const listItems = this.container.querySelectorAll(this.itemSelector);
        if (listItems.length === 0) return;

        if (this.activeIndex === -1) {
            this.setActiveByIndex(0);
        } else {
            const newIndex = (this.activeIndex === listItems.length - 1) ? 0 : this.activeIndex + 1;
            this.setActiveByIndex(newIndex);
        }
    }

    clickActiveAnchor() {
        if (this.activeIndex !== -1) {
            const activeItem = this.container.querySelectorAll(this.itemSelector)[this.activeIndex];
            const anchor = activeItem.querySelector('a');
            if (anchor) {
                anchor.click();
            }
        }
    }

    renderList(items) {
        if (!Array.isArray(items) || items.length === 0) return;

        const listHtml = items.map(item => {
            return this.template(item);
        }).join('');
        this.container.innerHTML = listHtml;
        this.attachEventListeners();
    }

    resetActiveIndex() {
        const listItems = this.container.querySelectorAll(this.itemSelector);
        listItems.forEach(item => item.classList.remove('active'));
        this.activeIndex = -1;
    }

    renderElement(element) {
        this.container.innerHTML = element;
    }
}
</script>
