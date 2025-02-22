<script>
    const replaceAndHighlightCodeElement = (preElement) => {
        preElement.className = "m-0 bg-transparent";
        let codeElement = preElement.querySelector("code");
        if (!codeElement.classList.length) {
            codeElement.classList.add("txt");
        }
        codeElement.classList.add("bg-transparent");
        Prism.highlightElement(codeElement);

        let card = document.createElement("div");
        let cardHeader = document.createElement("div");
        let cardBody = document.createElement("div");

        card.className = "card overflow-hidden border mb-3";
        cardHeader.className = "card-header bg-body-tertiary border-bottom-0 d-flex align-items-center justify-content-between";
        cardBody.className = "card-body p-0 bg-body-tertiary";

        let smallText = document.createElement("small");
        let button = document.createElement("button");
        let firstClass = codeElement.classList.item(0);

        smallText.innerHTML = firstClass || "code";
        smallText.className = "font-monospace";
        button.className = "btn btn-sm btn-light bg-transparent text-body p-0 border-0 font-monospace fw-normal";
        button.type = "button";
        button.innerHTML = `<i class="bi bi-clipboard me-2"></i>Copy Code`;
        button.addEventListener("click", () => {
            copyCode(button, codeElement);
        });

        cardHeader.appendChild(smallText);
        cardHeader.appendChild(button);
        card.appendChild(cardHeader);
        card.appendChild(cardBody);
        cardBody.appendChild(preElement.cloneNode(true));

        return card;
    };
</script>