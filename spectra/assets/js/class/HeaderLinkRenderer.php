<script>
    class HeaderLinkRenderer {
        constructor({ target, container, template }) {
            this.container = typeof container === 'string' ? document.querySelector(container) : container;
            this.target = typeof target === 'string' ? document.querySelector(target) : target;
            this.template = template;

            if (!this.container || !this.target) {
                throw new Error('Container or target element not found.');
            }

            this.headersInfo = this.getHeadersInfoWithLevel();
        }

        getHeadersInfoWithLevel() {
            const headers = this.target.querySelectorAll('h1, h2, h3, h4, h5, h6');
            if (!headers.length) return [];

            let headersInfo = [];
            headers.forEach((header, index) => {
                const levelNumber = parseInt(header.tagName.charAt(1));
                if (!header.id) {
                    header.id = `header-${index}`;
                }

                headersInfo.push({
                    level: levelNumber,
                    text: header.textContent.trim(),
                    id: header.id
                });
            });

            return headersInfo;
        }

        renderLinks() {
            const headersInfo = this.headersInfo.map(item => this.template(item)).join('');
            this.container.innerHTML = headersInfo;
        }
    }
</script>
